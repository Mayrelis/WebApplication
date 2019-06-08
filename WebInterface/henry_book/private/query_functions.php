<?php 

	function find_all_authors(){
		  global $db;
		  $sql = "SELECT * FROM Author ";
  		  $sql .= "ORDER BY authorNum ASC";
          $result = mysqli_query($db, $sql);
		  return $result;

	}

	function update_author($authorNum, $fname, $lname){
		global $db;

		$sql = "
			UPDATE Author SET authorLast='$lname',authorFirst='$fname'
			WHERE authorNum=$authorNum
		";

		$result = mysqli_query($db, $sql);
		if (!$result){
			echo '<h1 style="color:red;">ERROR:</h1>'.mysqli_error($db);

			exit;
		}

		return $result;
	}

	function find_author_by_id($id) {
    global $db;

    $sql = "SELECT * FROM Author ";
    $sql .= "WHERE authorNum='" . $id . "'";
    $result = mysqli_query($db, $sql);
    //confirm_result_set($result);
    $author = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $author; // returns an assoc. array
  }

function insert_author($author_last,$author_first){
		global $db;

    // Generate unique bookCode
    $entropy = "123456789";
    $code ="";
    for ($i = 0; $i < 2; $i++){
    	$code .= $entropy[rand(0, strlen($entropy)-1)];
    }

    $sql = "
    	INSERT INTO Author (authorNum, authorLast, authorFirst)
    	VALUES('$code', '$author_last', '$author_first')";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  function find_book_by_id($id) {
    global $db;

    $sql = "SELECT * FROM Book ";
    $sql .= "WHERE bookCode='$id'";
    $result = mysqli_query($db, $sql);

    if ($result)
        return mysqli_fetch_assoc($result);
    else
        echo mysqli_error($db);
    return false;
  }

 	// function to find all book in the HenryBook Databases.
 	function find_all_book(){
		  global $db;
		  $sql = "SELECT * FROM Book ";
  		  $sql .= "ORDER BY bookCode ASC";
          $result = mysqli_query($db, $sql);
          
          return $result;

	}
	
  //BOOK table
  //function to insert a new book by the user.
	function insert_book($title, $publisherCode, $type, $paperBack){
		global $db;


    // Generate unique bookCode
    $entropy = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $code ="";
    for ($i = 0; $i < 4; $i++){
    	$code .= $entropy[rand(0, strlen($entropy)-1)];
    }

    $sql = "
    	INSERT INTO Book (bookCode, title, publisherCode, type, paperback)
    	VALUES('$code', '$title', '$publisherCode','$type','$paperBack')";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  //function to update book
	function update_book($id, $title, $publisherCode, $type, $paperback){
		global $db;

		$sql = "
			UPDATE Book SET title='$title', publisherCode='$publisherCode', type='$type', paperback='$paperback'
			WHERE bookCode='$id'
		";

		$result = mysqli_query($db, $sql);
		if (!$result){
			echo '<h1 style="color:red;">ERROR:</h1>'.mysqli_error($db);

			exit;
		}

		return $result;
	}
		//COPY table
    // function to able to update copy   
		function update_copy($id, $quality, $price){
		global $db;

		$sql = "
			UPDATE Copy SET quality='$quality', price='$price'
			WHERE bookCode='$id'
		";

		$result = mysqli_query($db, $sql);
		if (!$result){
			echo '<h1 style="color:red;">ERROR:</h1>'.mysqli_error($db);

			exit;
		}

		return $result;
	}

  // function to find all copy 
	function find_all_copy(){
		  global $db;
		  $sql = "SELECT * FROM Copy ";
  		  $sql .= "ORDER BY bookCode ASC";
          $result = mysqli_query($db, $sql);
          //confirm_result_set($result);
		  return $result;

	}
  //function to find copy by id 
	function find_copy_by_id($id) {
    global $db;

    $sql = "SELECT * FROM Copy ";
    $sql .= "WHERE bookCode='$id'";
    $result = mysqli_query($db, $sql);

   if ($result)
        return mysqli_fetch_assoc($result);
    else
        echo mysqli_error($db);
    return false;
  }


  function insert_copy($branchNum, $copyNum, $quality, $price){
		global $db;

    // Generate unique bookCode
    $entropy = "0123456789";
    $code ="";
    for ($i = 0; $i < 4; $i++){
    	$code .= $entropy[rand(0, strlen($entropy)-1)];
    }

    $sql = "
    	INSERT INTO Copy (bookCode, branchNum, copyNum, quality,price)
    	VALUES('$code', '$branchNum', '$copyNum','$quality','$price')";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }


	// function to update publisher 
  	function update_publisher($id, $publisher_name, $city){
		global $db;

		$sql = "
			UPDATE Publisher SET publisherName='$publisher_name', city='$city'
			WHERE publisherCode='$id'
		";

		$result = mysqli_query($db, $sql);
		if (!$result){
			echo '<h1 style="color:red;">ERROR:</h1>'.mysqli_error($db);

			exit;
		}

		return $result;
	}

  // fucntion to find all publisher on the Publisher Table
	function find_all_publisher(){
		  global $db;
		  $sql = "SELECT * FROM Publisher ";
  		  $sql .= "ORDER BY publisherCode ASC";
          $result = mysqli_query($db, $sql);
          //confirm_result_set($result);
		  return $result;

	}
  // function find publisher by id 
	function find_publisher_by_id($id) {
    global $db;

    $sql = "SELECT * FROM Publisher ";
    $sql .= "WHERE publisherCode='" . $id . "'";
    $result = mysqli_query($db, $sql);

    //confirm_result_set($result);
    $publisher = mysqli_fetch_assoc($result);
    //mysqli_free_result($result);
    return $publisher; // returns an assoc. array
  }

  function insert_publisher($publisherName, $city){
    global $db;


    // Generate unique bookCode
    $entropy = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $code ="";
    for ($i = 0; $i < 2; $i++){
      $code .= $entropy[rand(0, strlen($entropy)-1)];
    }

    $sql = "
      INSERT INTO Publisher (publisherCode, publisherName, city)
      VALUES('$code', '$publisherName','$city')";
    $result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    if($result) {
      return true;
    } else {
      // INSERT failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }
  }

  //function to search by tittle and able to show the inventory availability for such book
  //branches where available , along with author and publisher information.
  function search_by_title($title){
    global $db;

    $sql = "
      SELECT
        A.bookCode AS bookCode,
          A.title AS bookTitle,
          A.publisherCode AS publisherCode,
          A.type AS bookType,
          A.paperback AS bookPaperback,
          H.authorLast AS authorNameLast,
          H.authorFirst AS authorNameFirst,
          D.publisherName AS publisherName,
          D.city AS publisherCity
      FROM
        Book A
      LEFT JOIN
        Wrote B ON B.bookCode = A.bookCode
      LEFT JOIN
        Author H ON H.authorNum = B.authorNum
      LEFT JOIN
        Publisher D ON D.publisherCode = A.publisherCode
      WHERE
        A.title like '$title'
    ";


        $result = mysqli_query($db, $sql);

    if($result) {

      // Book was found now we need to look to see if there is any inventory for it
      // Also we need to display branch information if there is inventory
      //      <?php while($book = mysqli_fetch_assoc($book_set))
      $bookInventory = [];
      // Get all book records found for title
      while(($set = (mysqli_fetch_assoc($result))) != null){

        // Inject invetory
        $set['inventory'] = [];

        // See if book in set has any inventory
        $sql2 = "
          SELECT
            B.branchNum,
              B.branchName,
              B.branchLocation,
              A.OnHand AS bookInventory
          FROM
            Inventory A
          LEFT JOIN
            Branch B ON B.branchNum = A.BranchNum
          WHERE
            A.BookCode = {$set['bookCode']}
        ";

        if (($result2 = (mysqli_query($db, $sql2)))) {
          if (mysqli_num_rows($result2) > 0){
            while(($iset = (mysqli_fetch_assoc($result2))) != null){
              array_push($set['inventory'], $iset);
            }
          }
        }

        array_push($bookInventory, $set);
      }
 
 
      return $bookInventory;
    } 
    else {
      echo mysqli_error($db);
      db_disconnect($db);
      return false;
    }
  }

	?>
