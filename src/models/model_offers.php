<?php
class Model_Offers extends Model {
    public $db;

     function getresult($stmt)
    {
      $result = array();
      
      $metadata = $stmt->result_metadata();
      $fields = $metadata->fetch_fields();

      for (;;)
      {
        $pointers = array();
        $row = new stdClass();
        
        $pointers[] = $stmt;
        foreach ($fields as $field)
        {
          $fieldname = $field->name;
          $pointers[] = &$row->$fieldname;
        }
        
        call_user_func_array(mysqli_stmt_bind_result, $pointers);
        
        if (!$stmt->fetch())
          break;
        
        $result[] = $row;
      }
      
      $metadata->free();
      
      return $result;
    }

    public  function get_offer_data($options, $pagination){

        $db = $this->db;

        $offset = htmlentities(mysqli_real_escape_string($db, $pagination["offset"]));
        
        
       if($options == null){
           $query = "SELECT offer.id AS offer_id, offer.name AS offer_name, offer.text, offer.author_id, 
                     offer.avg_price, offer.views, GROUP_CONCAT(DISTINCT tags.name ORDER BY tags.name) AS tags, 
                     users.name as author, users.hasTransport, users.city,
                     COUNT(comments.id) AS comments
           FROM offer 
                LEFT  JOIN comments ON offer.id = comments.offer_id
                LEFT JOIN users ON offer.author_id = users.id 
                LEFT JOIN offer_tags ON offer.id = offer_tags.offer_id 
                LEFT JOIN tags ON tags.id = offer_tags.tag_id 
                
           WHERE offer.active_status = 1 GROUP BY offer.publish_date DESC LIMIT ?, 5";
       }

       $stmt = mysqli_prepare($db, $query);
       $stmt->bind_param('i', $offset);

       $stmt->execute();

       $stmt->bind_result($offer_id, $offer_name, $text, $author_id, $avg_price, $views, $tags, $author, $hasTransport, $city, $comments);

       $result = array();
       $result["offers"] = array();
        while ($stmt->fetch()) {
            $offer["offer_id"] = $offer_id;
            $offer["offer_name"] = $offer_name;
            $offer["text"] = $text;
            $offer["author_id"] = $author_id;
            $offer["avg_price"] = $avg_price;
            $offer["views"] = $views;
            $offer["tags"] = $tags;
            $offer["author"] = $author;
            $offer["hasTransport"] = $hasTransport;
            $offer["city"] = $city;
            $offer["comments"] = $comments;

            array_push($result["offers"], $offer);
        }
        
        $stmt->close(); 
        
        
        $query_count  = "SELECT COUNT(*) AS offer_count FROM offer WHERE active_status = 1";
        $count = mysqli_query($db, $query_count) or die("Ошибка " . mysqli_error($db)); 
        $result["offer_count"] = $count->fetch_assoc(); 

       return $result;
    }
}