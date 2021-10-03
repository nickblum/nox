<!--    Made by Erik Terwan    -->
<!--   24th of November 2015   -->
<!--        MIT License        -->
<nav role="navigation">
  <div id="menuToggle">
    <input id="hamburger" type="checkbox" />
    <span class="hamburger"></span>
    <span class="hamburger"></span>
    <span class="hamburger"></span>
    
    <ul id="menu">
      <a href="#"><li><label><input type="radio" page="homestead.php" class="navrad" name="navrad" checked><span>Homestead</span></label></li></a>
      
      <?php  
        require_once('private/model/common.php');
        $ret = getNavSectors();
        while($row = $ret->data->fetch_assoc()) {
          echo '<a href="#"><li class="subitem"><label><input type="radio" page="sector.php" sector_id="'. $row['sector_id'] .'" class="navrad" name="navrad"><span>'. $row['title'] .'</span></label></li></a>';
        }
      ?>
      
      <a href="#"><li><label><input type="radio" class="navrad" page="grub.php" name="navrad" ><span>Grub</span></label></li></a>
      <a href="#"><li><label><input type="radio" class="navrad" page="settings.php" name="navrad" ><span>Settings</span></label></li></a>
      <a href="#"><li><label><input type="radio" class="navrad" page="logout.php" name="navrad" ><span>Log Out</span></label></li></a>
    </ul>
  </div>
  <div id="navdsp">Homestead</div>
</nav>