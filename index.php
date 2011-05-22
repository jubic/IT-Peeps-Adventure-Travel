<?php

    include('dbFunctions.php');
    session_start();

    if(isset($_SESSION['lemail'])) {

        $email = $_SESSION['lemail'];
        $role = $_SESSION['role'];

    }
    else {
        
        // Not logged in
        
    }

    if($_GET['action'] == 'delete' && $_GET['id']) {

                if(mysqli_query($link, "DELETE FROM tour_package WHERE `id` = '{$_GET['id']}'")) {

                    echo '<meta http-equiv="refresh" content="3;url=index.php">';

                }

                else {

                    echo "There's a problem deleting the article";

                }

            }

            // Selects the packages from the database and insert it into a variable.
            $arrPackages = executeSelectQuery("SELECT * FROM tour_package");
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ITPeeps Adventure Travel - Let Your Adventure Begin Here!</title>
        <script src="validate.js" type="text/javascript"></script> 
    </head>

    <body>
        <h1>ITPeeps Adventure Travel</h1>
        
        <?php
            if(isset($email)) {

                if($role == 'Member') {
                    
        ?>

                    <a href="index.php">Home</a> | <a href="logout.php">Log Out</a>
                    <hr/>
                    
        <?php
                
                }
                elseif($role == 'Administrator') {
                    
        ?>

                    <a href="index.php">Home</a> | <a href="add.php">Add Travel Packages</a> | <a href="members.php">View Members</a> | <a href="logout.php">Log Out</a>
                    <hr/>

        <?php

                }

        ?>

                    <h2>Travel Packages</h2>
                    <table>
                        
                        <?php

                            for($countPackages=0;$countPackages<count($arrPackages);$countPackages++) {
                                $image = $arrPackages[$countPackages]['image'];
                                $name = $arrPackages[$countPackages]['name'];
                                $id = $arrPackages[$countPackages]['id'];
                        ?>

                                <tr>

                                    <td><img src="packages/<?php echo $image;?>" width="90px"/></td>
                                    <td><?php echo $name;?></td>
                                    <td><a href="details.php?id=<?php echo $id ;?>">More Info</a>
                                <?php

                                    if($role == 'Administrator') {
                                    // Once the link below is clicked, Line 18-32 executes
                                ?>

                                    
                                    <td><a href="?action=delete&id=<?php echo $id;?>">Delete</a></td>
                            
                                <?php

                                    }

                                ?>

                                </tr>

                        <?php

                            }

                        ?>

                    </table>

        <?php
            
            }

            else{
        ?>
        
        <hr/>

        <h3>Login</h3>
        <form action="login.php" method="post">

            <table>

            <tr>

                <td><label for="lemail">Email</label></td>
                <td><label for="lpassword">Password</label></td>

            </tr>

            <tr>

                <td><input type="email" id="lemail" name="lemail" required="required"/></td>
                <td><input type="password" id="lpassword" name="lpassword" required="required"/></td>
                <td><input type="submit" id="login" name="login" value="Login"/>

            </tr>

            <tr>

                <td/>
                <td><a href="forgetPassword.php">Forgot password?</a></td>

            </tr>

          </table>

      </form>

      <h3>Register</h3>
        <form action="register.php" method="post">

            <table>

                <tr>

                    <td><strong>PERSONAL INFORMATION</strong></td>

                </tr>

                <tr>

                    <td><label for="rname">Full Name</label></td>
                    <td><input type="text" id="rname" name="rname" required="required"/></td>

                </tr>

                <tr>

                    <td><label for="remail">Email</label></td>
                    <td><input type="email" id="remail" name="remail" required="required"/></td>

                </tr>

                <tr>

                    <td><label for="rconfirmemail">Confirm Email</label></td>
                    <td><input type="email" id="rconfirmemail" name="rconfirmemail" required="required"/></td>

                </tr>

                <tr>

                    <td><label for="rpass">Password</label></td>
                    <td><input type="password" id="rpass" name="rpass" required="required"/></td>

                </tr>

                <tr>

                    <td><label for="rconfirmpass">Confirm Password</label></td>
                    <td><input type="password" id="rconfirmpass" name="rconfirmpass" required="required"/></td>

                </tr>

                <tr>

                    <td><label for ="rnationality">Nationality</label></td>
                    <td><select id="rnationality" name="rnationality" required="required">

                            <option value="" selected="selected">--Select Nationality--</option>
                            <option value="Afghan">Afghan</option>
                            <option value="Afrikaner">Afrikaner</option>
                            <option value="Albanian">Albanian</option>
                            <option value="Algerian">Algerian</option>
                            <option value="American">American</option>
                            <option value="Andorran">Andorran</option>
                            <option value="Angolan">Angolan</option>
                            <option value="Argentine">Argentine</option>
                            <option value="Armenian">Armenian</option>
                            <option value="Aromanian">Aromanian</option>
                            <option value="Aruban">Aruban</option>
                            <option value="Australian">Australian</option>
                            <option value="Austrian">Austrian</option>
                            <option value="Azeri">Azeri</option>
                            <option value="Bahamian">Bahamian</option>
                            <option value="Bahraini">Bahraini</option>
                            <option value="Balochi">Balochi</option>
                            <option value="Bangladeshi">Bangladeshi</option>
                            <option value="Barbadian">Barbadian</option>
                            <option value="Belarusian">Belarusian</option>
                            <option value="Belgian">Belgian</option>
                            <option value="Belizean">Belizean</option>
                            <option value="Bermudian">Bermudian</option>
                            <option value="Boer">Boer</option>
                            <option value="Bosnian">Bosnian</option>
                            <option value="Brazilian">Brazilian</option>
                            <option value="Breton">Breton</option>
                            <option value="British">British</option>
                            <option value="British Virgin Islanders">British Virgin Islanders</option>
                            <option value="Bulgarian">Bulgarian</option>
                            <option value="Burkinabè">Burkinabè</option>
                            <option value="Burundian">Burundian</option>
                            <option value="Cambodian">Cambodian</option>
                            <option value="Cameroonian">Cameroonian</option>
                            <option value="Canadian">Canadian</option>
                            <option value="Catalan">Catalan</option>
                            <option value="Cape Verdean">Cape Verdean</option>
                            <option value="Chadian">Chadian</option>
                            <option value="Chilean">Chilean</option>
                            <option value="Chinese">Chinese</option>
                            <option value="Colombian">Colombian</option>
                            <option value="Comorian">Comorian</option>
                            <option value="Congolese">Congolese</option>
                            <option value="Croatian">Croatian</option>
                            <option value="Cuban">Cuban</option>
                            <option value="Cypriot">Cypriot</option>
                            <option value="Czech">Czech</option>
                            <option value="Danes">Danes</option>
                            <option value="Dominican (Republic)">Dominican (Republic)</option>
                            <option value="Dominican (Commonwealth)">Dominican (Commonwealth)</option>
                            <option value="Dutch">Dutch</option>
                            <option value="East Timorese">East Timorese</option>
                            <option value="Ecuadorian">Ecuadorian</option>
                            <option value="Egyptian">Egyptian</option>
                            <option value="Emirati">Emirati</option>
                            <option value="English">English</option>
                            <option value="Eritrean">Eritrean</option>
                            <option value="Estonian">Estonian</option>
                            <option value="Ethiopian">Ethiopian</option>
                            <option value="Finn">Finn</option>
                            <option value="Finnish Swedish">Finnish Swedish</option>
                            <option value="Fijian">Fijian</option>
                            <option value="Filipino">Filipino</option>
                            <option value="French">French</option>
                            <option value="Georgian">Georgian</option>
                            <option value="German">German</option>
                            <option value="Ghanaian">Ghanaian</option>
                            <option value="Gibraltar">Gibraltar</option>
                            <option value="Greek">Greek</option>
                            <option value="Grenadian">Grenadian</option>
                            <option value="Guatemalan">Guatemalan</option>
                            <option value="Guianese (French)">Guianese (French)</option>
                            <option value="Guinean">Guinean</option>
                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                            <option value="Guyanese">Guyanese</option>
                            <option value="Haitian">Haitian</option>
                            <option value="Honduran">Honduran</option>
                            <option value="Hong Konger">Hong Konger</option>
                            <option value="Hungarian">Hungarian</option>
                            <option value="Icelander">Icelander</option>
                            <option value="Indian">Indian</option>
                            <option value="Indonesian">Indonesian</option>
                            <option value="Iranian (Persians)">Iranian (Persians)</option>
                            <option value="Iraqi">Iraqi</option>
                            <option value="Irish">Irish</option>
                            <option value="Israeli">Israeli</option>
                            <option value="Italian">Italian</option>
                            <option value="Ivoirian">Ivoirian</option>
                            <option value="Jamaican">Jamaican</option>
                            <option value="Japanese">Japanese</option>
                            <option value="Jordanian">Jordanian</option>
                            <option value="Kazakh">Kazakh</option>
                            <option value="Kenyan">Kenyan</option>
                            <option value="Koreans">Koreans</option>
                            <option value="Kosovo Albanian">Kosovo Albanian</option>
                            <option value="Kuwaiti">Kuwaiti</option>
                            <option value="Lao">Lao</option>
                            <option value="Latvian">Latvian</option>
                            <option value="Lebanese">Lebanese</option>
                            <option value="Liberian">Liberian</option>
                            <option value="Libyan">Libyan</option>
                            <option value="Liechtensteiner">Liechtensteiner</option>
                            <option value="Lithuanian">Lithuanian</option>
                            <option value="Luxembourger">Luxembourger</option>
                            <option value="Macedonian">Macedonian</option>
                            <option value="Malawian">Malawian</option>
                            <option value="Malaysian">Malaysian</option>
                            <option value="Maldivian">Maldivian</option>
                            <option value="Malian">Malian</option>
                            <option value="Maltese">Maltese</option>
                            <option value="Manx">Manx</option>
                            <option value="Mauritian">Mauritian</option>
                            <option value="Mexican">Mexican</option>
                            <option value="Moldovan">Moldovan</option>
                            <option value="Moroccan">Moroccan</option>
                            <option value="Mongolian">Mongolian</option>
                            <option value="Montenegrin">Montenegrin</option>
                            <option value="Namibian">Namibian</option>
                            <option value="Nepalese">Nepalese</option>
                            <option value="New Zealander">New Zealander</option>
                            <option value="Nicaraguan">Nicaraguan</option>
                            <option value="Nigerien">Nigerien</option>
                            <option value="Nigerian">Nigerian</option>
                            <option value="Norwegian">Norwegian</option>
                            <option value="Pakistanis">Pakistanis</option>
                            <option value="Palauan">Palauan</option>
                            <option value="Palestinian">Palestinian</option>
                            <option value="Panamanian">Panamanian</option>
                            <option value="Papua New Guinean">Papua New Guinean</option>
                            <option value="Paraguayan">Paraguayan</option>
                            <option value="Peruvian">Peruvian</option>
                            <option value="Polish">Polish</option>
                            <option value="Portuguese">Portuguese</option>
                            <option value="Puerto Rican">Puerto Rican</option>
                            <option value="Quebecer">Quebecer</option>
                            <option value="Réunionnai">Réunionnai</option>
                            <option value="Romanian">Romanian</option>
                            <option value="Russian">Russian</option>
                            <option value="Rwandan">Rwandan</option>
                            <option value="Salvadoran">Salvadoran</option>
                            <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                            <option value="Saudi">Saudi</option>
                            <option value="Scot">Scot</option>
                            <option value="Senegalese">Senegalese</option>
                            <option value="Serb">Serb</option>
                            <option value="Sicilian">Sicilian</option>
                            <option value="Sierra Leonean">Sierra Leonean</option>
                            <option value="Singaporean">Singaporean</option>
                            <option value="Slovak">Slovak</option>
                            <option value="Slovene">Slovene</option>
                            <option value="Somali">Somali</option>
                            <option value="South African">South African</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Sri Lankan">Sri Lankan</option>
                            <option value="Sudanese">Sudanese</option>
                            <option value="Swedes">Swedes</option>
                            <option value="Swiss">Swiss</option>
                            <option value="Syrian">Syrian</option>
                            <option value="Taiwanese">Taiwanese</option>
                            <option value="Tanzanian">Tanzanian</option>
                            <option value="Thai">Thai</option>
                            <option value="Tibetan">Tibetan</option>
                            <option value="Tobagonian">Tobagonian</option>
                            <option value="Trinidadian">Trinidadian</option>
                            <option value="Turk">Turk</option>
                            <option value="Tuvaluan">Tuvaluan</option>
                            <option value="Ugandan">Ugandan</option>
                            <option value="Ukrainian">Ukrainian</option>
                            <option value="Uruguayan">Uruguayan</option>
                            <option value="Venezuelan">Venezuelan</option>
                            <option value="Vietnamese">Vietnamese</option>
                            <option value="Welsh">Welsh</option>
                            <option value="Yemenis">Yemenis</option>
                            <option value="Zambian">Zambian</option>
                            <option value="Zimbabwean">Zimbabwean</option>

                        </select>

                    </td>

                </tr>

                <tr>

                    <td><label for="raddress">Residential Address</label></td>
                    <td><textarea id="raddress" name="raddress" rows="10" cols="17" required="required"></textarea></td>

                </tr>

                <tr>

                    <td><label for="rpostal">Postal Code</label></td>
                    <td><input type="text" id="rpostal" name="rpostal" required="required"/></td>

                </tr>

                <tr>

                    <td><label for="rcountry">Country</label></td>
                    <td><select id="rcountry" name="rcountry" required="required">

                            <option selected="selected">--Select Country--</option>
                            <option value="Afghanistan">Afghanistan</option>
                            <option value="Albania">Albania</option>
                            <option value="Algeria">Algeria</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armenia">Armenia</option>
                            <option value="Australia">Australia</option>
                            <option value="Austria">Austria</option>
                            <option value="Azerbaijan">Azerbaijan</option>
                            <option value="Bahamas">Bahamas</option>
                            <option value="Bahrain">Bahrain</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Belize">Belize</option>
                            <option value="Benin">Benin</option>
                            <option value="Bhutan">Bhutan</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="Botswana">Botswana</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Brunei">Brunei</option>
                            <option value="Bulgaria">Bulgarian</option>
                            <option value="Burkina Faso">Burkina Faso</option>
                            <option value="Burma">Burma</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Cambodia">Cambodia</option>
                            <option value="Cameroon">Cameroon</option>
                            <option value="Canada">Canada</option>
                            <option value="Cape Verde">Cape Verde</option>
                            <option value="Central African Republic">Central African Republic</option>
                            <option value="Chad">Chad</option>
                            <option value="Chile">Chile</option>
                            <option value="China">China</option>
                            <option value="Colombia">Colombia</option>
                            <option value="Comoros">Comoros</option>
                            <option value="Congo">Congo</option>
                            <option value="Costa Rica">Costa Rica</option>
                            <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                            <option value="Croatia">Croatia</option>
                            <option value="Cuba">Cuba</option>
                            <option value="Cyprus">Cyprus</option>
                            <option value="Czech Republic">Czech Republic</option>
                            <option value="Denmark">Denmark</option>
                            <option value="Djibouti">Djibouti</option>
                            <option value="Dominica">Dominica</option>
                            <option value="Dominican Republic">Dominican Republic</option>
                            <option value="East Timor">East Timor</option>
                            <option value="Ecuador">Ecuador</option>
                            <option value="Egypt">Egypt</option>
                            <option value="El Salvador">El Salvador</option>
                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="Eritrea">Eritrea</option>
                            <option value="Estonia">Estonia</option>
                            <option value="Ethiopia">Ethiopia</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finland">Finland</option>
                            <option value="France">France</option>
                            <option value="Gabon">Gabon</option>
                            <option value="The Gambia">The Gambia</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Germany">Germany</option>
                            <option value="Ghana">Ghana</option>
                            <option value="Greece">Greece</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Guatemala">Guatemala</option>
                            <option value="Guinea">Guinea</option>
                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                            <option value="Guyana">Guyana</option>
                            <option value="Haiti">Haiti</option>
                            <option value="Honduras">Honduras</option>
                            <option value="Hungary">Hungary</option>
                            <option value="Iceland">Iceland</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Iran">Iran</option>
                            <option value="Iraq">Iraq</option>
                            <option value="Ireland">Ireland</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Jamaica">Jamaica</option>
                            <option value="Japan">Japan</option>
                            <option value="Jordan">Jordan</option>
                            <option value="Kazakhstan">Kazakhstan</option>
                            <option value="Kenya">Kenya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Korea, North">Korea, North</option>
                            <option value="Korea, South">Korea, South</option>
                            <option value="Kuwait">Kuwait</option>
                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="Laos">Laos</option>
                            <option value="Latvia">Latvia</option>
                            <option value="Lebanon">Lebanon</option>
                            <option value="Lesotho">Lesotho</option>
                            <option value="Liberia">Liberia</option>
                            <option value="Libya">Libya</option>
                            <option value="Liechtenstein">Liechtenstein</option>
                            <option value="Lithuania">Lithuania</option>
                            <option value="Luxembourg">Luxembourg</option>
                            <option value="Macedonia">Macedonia</option>
                            <option value="Madagascar">Madagascar</option>
                            <option value="Malawi">Malawi</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Maldives">Maldives</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Marshall Islands">Marshall Islands</option>
                            <option value="Mauritania">Mauritania</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Micronesia">Micronesia</option>
                            <option value="Moldova">Moldova</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Mongolia">Mongolia</option>
                            <option value="Montenegro">Montenegro</option>
                            <option value="Morocco">Morocco</option>
                            <option value="Mozambique">Mozambique</option>
                            <option value="Namibia">Namibia</option>
                            <option value="Nauru">Nauru</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Netherlands">Netherlands</option>
                            <option value="New Zealand">New Zealand</option>
                            <option value="Nicaragua">Nicaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeria">Nigeria</option>
                            <option value="Norway">Norway</option>
                            <option value="Oman">Oman</option>
                            <option value="Pakistan">Pakistan</option>
                            <option value="Palau">Palau</option>
                            <option value="Panama">Panama</option>
                            <option value="Papua New Guinea">Papua New Guinea</option>
                            <option value="Paraguay">Paraguay</option>
                            <option value="Peru">Peru</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Poland">Poland</option>
                            <option value="Portugal">Portugal</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Romania">Romania</option>
                            <option value="Russia">Russia</option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="Saint Lucia">Saint Lucia</option>
                            <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                            <option value="Samoa">Samoa</option>
                            <option value="San Marino">San Marino</option>
                            <option value="São Tomé and Príncipe">São Tomé and Príncipe</option>
                            <option value="Saudi Arabia">Saudi Arabia</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbia">Serbia</option>
                            <option value="Seychelles">Seychelles</option>
                            <option value="Sierra Leone">Sierra Leone</option>
                            <option value="Singapore">Singapore</option>
                            <option value="Slovakia">Slovakia</option>
                            <option value="Slovenia">Slovenia</option>
                            <option value="Solomon Islands">Solomon Islands</option>
                            <option value="Somalia">Somalia</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Spain">Spain</option>
                            <option value="Sri Lanka">Sri Lanka</option>
                            <option value="Sudan">Sudan</option>
                            <option value="Suriname">Suriname</option>
                            <option value="Swaziland">Swaziland</option>
                            <option value="Sweden">Sweden</option>
                            <option value="Switzerland">Switzerland</option>
                            <option value="Syria">Syria</option>
                            <option value="Tajikistan">Tajikistan</option>
                            <option value="Tanzania">Tanzania</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Togo">Togo</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="Tunisia">Tunisia</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Turkmenistan">Turkmenistan</option>
                            <option value="Tuvalu">Tuvalu</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                            <option value="Uruguay">Uruguay</option>
                            <option value="Uzbekistan">Uzbekistan</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Vatican City">Vatican City</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="Vietnam">Vietnam</option>
                            <option value="Yemen">Yemen</option>
                            <option value="Zambia">Zambia</option>
                            <option value="Zimbabwe">Zimbabwe</option>

                        </select>

                    </td>

                </tr>

                <tr>

                    <td><label for="rcontact">Contact Number</label></td>
                    <td><input type="text" id="rcontact" name="rcontact" required="required"/></td>

                </tr>

                <tr>

                    <td>&nbsp;</td>
                    <td><input name="submit" value="Register" type="submit" onClick="return checkmail(this.form.remail)"><input type="reset" value="Reset"></td>
                    <td>&nbsp;</td>

                </tr>

            </table>
        </form>
      <?php

            }
            
      ?>
    </body>
</html>