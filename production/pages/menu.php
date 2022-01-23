<?php
$title = $_GET['category'];
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once('./components/head.php') ?>

<body>
  <div class="wrapper">
    <?php include_once('./components/header.php') ?>

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

    <?php include_once('./components/footer.php') ?>
  </div>
</body>

</html>