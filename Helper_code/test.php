while ($row = $result->fetch_assoc()) {
              // Store values in session
              $_SESSION['restaurant_name'] = $row['restaurant_name'];
              $_SESSION['restaurant_id'] = $row['restaurant_id'];
              $_SESSION['policeStation'] = $row['policeStaion'];
              $_SESSION['contact_number'] = $row['contactNumber1'];
              $_SESSION['details_address'] = $row['detailsAddress'];
              $_SESSION['r_image'] = $row['r_image'];
              $_SESSION['map'] = $row['map'];
              //echo  $_SESSION['restaurant_id'];
           // $_SESSION['map'] = $row['map'];
           //echo '<p>';
           //echo '<iframe src="' . htmlspecialchars($row['map']) . '" ... ></iframe>';
           //echo '</p>';            
            
            //$_SESSION['map'] = $row['map'];
            ?>
            <a href="http://localhost/project/restaurantDetails.php?restaurant_name=<?php echo $row['restaurant_name']; ?>&restaurant_id=<?php echo $row['restaurant_id']; ?>&policeStation=<?php echo $row['policeStaion']; ?>&contact_number=<?php echo $row['contactNumber1']; ?>&details_address=<?php echo $row['detailsAddress']; ?> ?&map=<?php echo urlencode($row['map']); ?>" class="card-item">
              <img src="<?php echo $row['r_image']; ?>" alt="Card Image">
              <span class="rName">
                <?php echo $row['restaurant_name']; ?>
              </span>
              <span class="rArea">
                <?php echo "Area : " . $row['policeStaion']; ?>
              </span>
              <span class="rNum">
                <?php echo "Contact : " . $row['contactNumber1']; ?>
              </span>
              <span class="cDetails">
                <?php echo $row['detailsAddress']; ?>
              </span>
              <span class="cStatus">
                <?php echo "OPEN NOW"; ?>
              </span>
              <div class="arrow">
                <i class="fa-solid fa-up-right-and-down-left-from-center card-icon"></i>
              </div>
            </a>
            <?php
            $count += 1;

          }