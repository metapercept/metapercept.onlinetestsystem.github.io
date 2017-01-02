   <table border = "1px solid black">
    <?php
  $id = $_GET['test_category_id'];
     $sql1="SELECT * FROM questions where test_category_id = '". $id . "' LIMIT 1 OFFSET $a"; /*order by RAND() LIMIT 1 OFFSET $a";*/
        $result=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($result))
        {
          $ques_no = $row['question_no'];
          $ques = $row['question'];
          $opt1 = $row['opt1'];
          $opt2 = $row['opt2'];
          $opt3 = $row['opt3'];
          $opt4 = $row['opt4'];
            echo "<tr><td width = '33.33%'><div id = 'status'></div></td>
                  <td width = '33.33%'><div id = 'quest_no' style = 'text-align:center;'>Question No. : 1</div></td>
                  <td width = '33.33%'><div>&nbsp;</div></td>
            </tr>";
            echo "<tr>";
            echo "<td  colspan = '3'><div id = 'question' style = 'border:1px solid black!important; border-radius:5px; margin:2px; padding: 5px; height:100px;'>".$ques."</div></td></tr>";  
            echo "<tr><td>1. <input type='radio' value='option1' name='answer' onclick = 'checkAnswer(this.value)'>" . " " . $opt1 . "</td></tr>";
            echo "<tr><td>2. <input type='radio' value='option2' name='answer' onclick = 'checkAnswer(this.value)'>" . " " . $opt2 . "</td></tr>";
            echo "<tr><td>3. <input type='radio' value='option3' name='answer' onclick = 'checkAnswer(this.value)'>" . " " . $opt3 . "</td></tr>";
            echo "<tr><td>4. <input type='radio' value='option4' name='answer' onclick = 'checkAnswer(this.value)'>" . " " . $opt4 . "</td></tr>";	 
        } 

        $a=$a+1;
        echo "<tr><td><input type='hidden' value='$ques_no' name='question_no'></td></tr>";
        echo "<tr><td><input type='hidden' value='$a' name='a'></td></tr>";
        echo "<tr><td><input type='submit' id = 'next' name='next' value='next'></td>";
           echo "</tr>";        
        ?>
                        </table>
                         </form>