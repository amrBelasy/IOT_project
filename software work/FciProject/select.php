<?php
    include("function.php");
?> 
            <div class="dropdown-menu" aria-labelledby="dropdown01" style="background: #ccc;padding: 20px;">
                <?php
                $query = "SELECT * FROM 'poles_info' WHERE line1volt > 240 OR line1volt < 190 OR line2volt > 240 OR line2volt < 190  OR line3volt > 240 OR line3volt < 190 order by 'last_change' DESC";
                 if(count(fetchAll($query))>0){
                     foreach(fetchAll($query) as $i){
                ?>
                  <?php 
                  
                if($i['line1volt'] > 240 )
                {
                    echo ucfirst("pole ". $i['poles_number'])." has a high voltage of  ". $i['line1volt'] . "<br>";
                    echo date('F j, Y, g:i a',strtotime($i['last_change']));
                }
                else if($i['line1volt'] < 190 )
                {
                    echo ucfirst("pole " .$i['poles_number'])." has low voltage of " . $i['line1volt'] . "<br>";
                    echo date('F j, Y, g:i a',strtotime($i['last_change']));
                }  
                else if($i['line2volt'] < 190 )
                {
                    echo ucfirst("pole " .$i['poles_number'])." has low voltage of " . $i['line2volt'] . "<br>";
                    echo date('F j, Y, g:i a',strtotime($i['last_change']));
                } 
                else if($i['line2volt'] > 240 )
                {
                    echo ucfirst("pole " .$i['poles_number'])." has high voltage of " . $i['line2volt'] . "<br>";
                    echo date('F j, Y, g:i a',strtotime($i['last_change']));
                } 
                else if($i['line3volt'] < 190 )
                {
                    echo ucfirst("pole " .$i['poles_number'])." has low voltage of " . $i['line3volt'] . "<br>";
                    echo date('F j, Y, g:i a',strtotime($i['last_change']));
                } 
                else if($i['line3volt'] >  240 )
                {
                    echo ucfirst("pole " .$i['poles_number'])." has high voltage of " . $i['line3volt'] . "<br>";
                    echo date('F j, Y, g:i a',strtotime($i['last_change']));
                } 
                  
                  ?>
              <div class="dropdown-divider"></div>
                <?php
                     }
                 }else{
                     echo "All Things likes good here, but alwayes have a look.";
                 }
                     ?>
            </div>
          </li>
        </ul>
      </div>
    </nav>
                     </body>
                     </html>