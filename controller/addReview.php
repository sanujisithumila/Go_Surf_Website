<?php
include "../config/db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $rating = $_POST['rating'];
  $user_id = $_POST['session-id'];
  $content = $_POST['review'];

  $sql = "INSERT INTO reviews (review_user_id, content, stars) VALUES ($user_id, '$content', $rating)";
  $result = $conn->query($sql);

  if ($result) {
    echo "
      <script>
        alert('Review added. Thank you!');
        window.location.href = '../index.php';
      </script>
    ";
  } else {
    echo "Error: " . $conn->error . "<br>";
    header("Location: ../index.php");
    exit();
  }

  $conn->close();

} else {
  header("Location: ../login.php");
  exit();
}
?>