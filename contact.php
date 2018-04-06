<?php include('newsletterSignup.php');?>

<!DOCTYPE html>
<html>
            <?php
                include('header.php');
                echo "$headHeaderNavigation";
            ?>

            <div id="content" class="clearfix">
                <aside>
                        <h2>Mailing Address</h2>
                        <h3>1385 Woodroffe Ave<br>
                            Ottawa, ON K4C1A4</h3>
                        <h2>Phone Number</h2>
                        <h3>(613)727-4723</h3>
                        <h2>Fax Number</h2>
                        <h3>(613)555-1212</h3>
                        <h2>Email Address</h2>
                        <h3>info@wpeatery.com</h3>
                </aside>
                <div class="main">
                    <h1>Sign up for our newsletter</h1>
                    <p>Please fill out the following form to be kept up to date with news, specials, and promotions from the WP eatery!</p>
                    <form name="frmNewsletter" id="frmNewsletter" method="post" action="<?php htmlspecialchars("newsletterSignup.php");?>">
                        <table>
                            <tr>
                                <td>Name:</td>
                                <td><input type="text" name="customerName" id="customerName" placeholder="Jane Doe" size='40'>
                                    <span class="errorspan"><?php echo $customerNameError;?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Phone Number:</td>
                                <td><input type="text" name="phoneNumber" id="phoneNumber"  placeholder="613-123-4567" size='40'>
                                    <span class="errorspan"><?php echo $phoneNumberError;?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Email Address:</td>
                                <td><input type="text" name="emailAddress" id="emailAddress" placeholder="you@domain.com" size='40'>
                                    <span class="errorspan"><?php echo $emailAddressError;?></span>
                                </td>
                            </tr>
                            <tr>
                                <td>How did you hear<br> about us?</td>
                                <td>Newspaper<input type="radio" name="referral" id="referralNewspaper" value="newspaper">
                                    Radio<input type="radio" name='referral' id='referralRadio' value='radio'>
                                    TV<input type='radio' name='referral' id='referralTV' value='TV'>
                                    Other<input type='radio' name='referral' id='referralOther' value='other'>
                                    <span class="errorspan"><?php echo $referralError;?></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2'>
                                    <input type='submit' name='btnSubmit' id='btnSubmit' value='Sign up!'>&nbsp;
                                    <input type='reset' name="btnReset" id="btnReset" value="Reset Form">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div><!-- End Main -->
            </div><!-- End Content -->
            <?php
                include('footer.php');
                echo "$footer";
            ?>
</html>
