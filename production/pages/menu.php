<?php
$title = $_GET['category'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pasibrzuch - kuchnia polska</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans+Condensed:wght@300;400;700&family=Sail&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../styles/base.css" />
</head>

<body>
  <div class="wrapper">
    <header class="heading">
      <img src="./assets/logo.svg" alt="Pasibrzuch - kuchnia polska logo" class="heading-logo" />
      <div class="heading-typo">
        <h1>Pasibrzuch</h1>
        <p>Jedzenie na każdą okazję</p>
      </div>
    </header>

    <main>
      <h2><?php echo "Menu - " . $title; ?></h2>

      <section>
        <?php
        // Get the menu items for the selected category

        ?>
        <!-- <article class="menu-item">
          <figure>
            <picture>
              <img src="./assets/kuchnia-polska.jpg" alt="item-1" />
            </picture>
            <figcaption>Opis dania, mmm dombre</figcaption>
          </figure>
          <button>Zamów</button>
        </article> -->
      </section>
    </main>

    <?php include_once('../components/footer.php') ?>
  </div>
</body>

</html>