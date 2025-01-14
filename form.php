<?php
var_dump($_POST);
require __DIR__ . '/inc/db-connect.inc.php';
require __DIR__ . '/inc/functions.inc.php';

$titleError = false;
$messageError = false;
$dateError = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (empty($_POST['title'])) {
    // var_dump($_POST['title']);
    $titleError = true;
  }
  if (empty($_POST['date'])) {
    $dateError = true;
  }
  if (empty($_POST['message'])) {
    $messageError = true;
  }


  if ($titleError === false && $dateError === false && $messageError === false) { // means no error 
    // code to save the user in the DB
    header('Location:thankyou.php');
    die();
  }
}


?>

<?php require __DIR__ . '/views/header.view.php' ?>
<h1 class="main-heading">New Entry</h1>
<form method="POST" action="thankyou.php">
  <div class="form-group">
    <label class="form-group__label" for="title">Title:</label>
    <input
      class="form-group__input"
      type="text"
      id="title"
      name="title"
      value="<?php if (!empty($_POST['title'])) echo e($_POST['title']); ?>" />
    <p><?php echo $titleError === true ? 'please enter the title' : '' ?></p>
  </div>

  <div class="form-group">
    <label class="form-group__label" for="date">Date:</label>
    <input
      class="form-group__input"
      type="date"
      id="date"
      name="date"
      value="<?php if (!empty($_POST['date'])) echo e($_POST['date']); ?>" />
    <p><?php echo $dateError === true ? 'please enter the date' : '' ?></p>
  </div>
  <div class="form-group">
    <label class="form-group__label" for="message">Message:</label>
    <textarea
      class="form-group__input"
      id="message"
      name="message"
      rows="6"
      value="<?php if (!empty($_POST['message'])) echo e($_POST['message']); ?>"></textarea>
    <p><?php echo $messageError === true ? 'please enter the message' : '' ?></p>

  </div>
  <div class="form-submit">
    <button class="button">
      <svg class="button__icon" viewBox="0 0 34.7163912799 33.4350009649">
        <defs>
          <style>
            .uuid-227ecc73-5fef-4efb-920c-3f9dd27ef3fc {
              fill: none;
              stroke: #f3f4f5;
              stroke-linecap: round;
              stroke-linejoin: round;
              stroke-width: 2px;
            }
          </style>
        </defs>
        <g
          style="
              fill: none;
              stroke: currentColor;
              stroke-linecap: round;
              stroke-linejoin: round;
              stroke-width: 2px;
            ">
          <polygon
            points="20.6844359446 32.4350009649 33.7163912799 1 1 10.3610302393 15.1899978903 17.5208901631 20.6844359446 32.4350009649" />
          <line
            x1="33.7163912799"
            y1="1"
            x2="15.1899978903"
            y2="17.5208901631" />
        </g>
      </svg>
      Save!
    </button>
  </div>
</form>
</div>
<?php require __DIR__ . '/views/footer.view.php' ?>