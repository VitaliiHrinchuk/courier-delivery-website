<?php
class Model_Offers extends Model {
    public $db;
    public $offer_count  = 0;
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
        
        // $query = "SELECT  offer.id , offer.name AS offer_name, offer.text, offer.author_id, 
        //              offer.avg_price, offer.views, GROUP_CONCAT(DISTINCT tags.name ORDER BY tags.name) AS tags, 
        //              users.name as author, users.hasTransport, users.city,
        //              COUNT(comments.id) AS comments
        //    FROM (offer)

        //         LEFT JOIN comments ON (offer.id = comments.offer_id)
        //         LEFT JOIN users ON (offer.author_id = users.id) 
        //         LEFT JOIN offer_tags ON (offer.id = offer_tags.offer_id )
        //         LEFT JOIN tags ON (tags.id = offer_tags.tag_id )
        //     ";

        $query = "SELECT offer.id , offer.name AS offer_name, offer.text, offer.author_id, offer.avg_price, offer.views, GROUP_CONCAT(DISTINCT tags.name ORDER BY tags.name) AS tags, users.name as author, users.hasTransport, users.city, COUNT(comments.id) AS comments FROM (offer) LEFT JOIN comments ON (offer.id = comments.offer_id) LEFT JOIN users ON (offer.author_id = users.id) LEFT JOIN offer_tags ON (offer.id = offer_tags.offer_id ) LEFT JOIN tags ON (tags.id = offer_tags.tag_id ) WHERE users.city='Вінниця'";
      

       if($options == null){
           $query .= " GROUP BY offer.publish_date DESC LIMIT ?, 5";
           $stmt = mysqli_prepare($db, $query);
           $this->count_offers(''."WHERE offer.active_status = 1");
       } else {

            $conditions = array();

            if($options["search"] != null) {
                $search = htmlentities(mysqli_real_escape_string($db, $options["search"]));
                $conditions[] = "offer.name='$search'";
            }
            if($options["city"] != null) {
                $city = htmlentities(mysqli_real_escape_string($db, $options["city"]));
                $conditions[] = "users.city='$city'";
            }
            if($options["tags"] != null) {
                $tag = htmlentities(mysqli_real_escape_string($db, $options["tags"]));
                $conditions[] = "tags.name='$tag'";
            }
            if($options["transport"] != null) {
                $transport = $options["transport"] == "on" ? 1 : 0; 
                $transport = htmlentities(mysqli_real_escape_string($db, $options["transport"]));
                $conditions[] = "hasTransport='$transport'";
            }
            $condition_query = ' ';
            // if (count($conditions) > 0) {
            //     $condition_query = " WHERE " . implode(' AND ', $conditions);
            //   }

           $query .= $condition_query . " GROUP BY offer.publish_date DESC LIMIT ?, 5";
           
           $stmt = mysqli_prepare($db, $query);

              echo $query;
              
        //    $stmt->bind_param('sssii', $search, $city, $tag, $transport, $offset);
              $this->count_offers($condition_query);
       }
       
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
        
        

        
        
        $result["offer_count"] = $this->offer_count;

       return $result;
    }

    function get_tags(){
        $db = $this->db;
        $query  = "SELECT * FROM tags";
        $count = mysqli_query($db, $query) or die("Ошибка " . mysqli_error($db)); 
        $result = array();
        while($row = $count->fetch_assoc()){
            array_push($result,$row['name']);
        } 
        return $result;
    }
    function count_offers($condition_query){
        $db = $this->db;
        $query_count  = "SELECT COUNT(*) AS offer_count FROM offer " . $condition_query;
        $count = mysqli_query($db, $query_count) or die("Ошибка " . mysqli_error($db)); 
        $this->offer_count = $count->fetch_assoc(); 
    }
}