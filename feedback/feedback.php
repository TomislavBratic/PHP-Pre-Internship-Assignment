<?php include 'inc/header.php'; ?>

<?php
$sql = 'SELECT * FROM feedback';
$result = mysqli_query($conn, $sql);
$feedback = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

   
  <h2>Past Feedback</h2>

  <?php if (empty($feedback)): ?>
    <p class="lead mt-3">There is no feedback</p>
  <?php endif; ?>

  <?php foreach ($feedback as $item): ?>
    <div class="card my-3 w-75">
     <div class="card-body text-center">
     <br>Comment:<?php echo $item['body']; ?></br>
       
       <div class="text-secondary mt-2">By <?php echo $item[
         'name'
       ]; ?> on <?php echo date_format(
   date_create($item['date']),
   'g:ia \o\n l jS F Y'
 ); ?></div>

<br>Rating:<?php switch ($item['rating']) {
    case 1:
    echo '*';
    break;
  case 2:
    echo '**';
    break;
  case 3:
    echo '***';
    break;
   case 4:
    echo '****';
    break;
    case 5:
      echo '*****';
      break;
  default:
    echo 'No rating';
} /* echo $item['rating'];*/ ?></br>


    <br><a href="<?php echo $item['url']; ?>"><?php echo $item['url']; ?></a></br>
     </div>
   </div>
  <?php endforeach; ?>
<?php include 'inc/footer.php'; ?>
