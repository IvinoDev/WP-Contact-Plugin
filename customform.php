<?php
    /**
 * @package Custom_Form
 * @version 0.0.1
 */
/*
Plugin Name: Custom Form
Plugin URI: https://github.com/IvinoDev/WP-Contact-Plugin
Description: Just a simple contact form plugin made for training purposes.
Author: Mariam D Kayantao
Version: 0.0.1
Author URI: https://github.com/IvinoDev
*/

function contact_form() {

    $content = ' <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/css/style.css">
        <style>
            .form-box {
                /* margin-top: 5%; */
                max-width: 500px;
                margin: auto;
                padding: 50px;
                background: #ffffff;
                border-radius: 15px;
                border: 5px solid #f2f2f2;
            }
            
            h1, h2
            p {
                text-align: center;
            }
            
            input,
            textarea {
                width: 100%;
                box-shadow: none;
            }
            
            .btnsub:hover {
                border-color: black;
                
            }

            input {
                border-radius: 5px;
            }
        </style>
        <title>Simple Form</title>
    </head>
    <body>
        <div class="form-box" style="margin-top: 5%;" >
            <h1>Formulaire</h1>
            <form action="http://localhost/wootest/merci/" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" id="email" type="email" name="Email" placeholder="Entrez votre adresse e-mail">
                </div>
                <div class="form-group">
                    <label for="object">Objet</label>
                    <input class="form-control" id="object" type="text" name="Object" placeholder="Objet de votre message">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="Description" placeholder="Description de votre message"></textarea>
                </div>
                    <input class="btn btn-primary btnsub" type="submit" name="contact_form_submit" value="Envoyer" />
                </div>
            </form>
        </div>
    </body>
</html>';

    return $content;

}

add_shortcode('custom_form','contact_form');

function contact_form_capture() {
    if (isset($_POST['contact_form_submit'])) {
        echo "<pre>";print_r($_POST);echo "</pre>";
        $email = sanitize_text_field($_POST['Email']);
        $object = sanitize_text_field($_POST['Object']);
        $description = sanitize_textarea_field($_POST['Description']);
        echo $email."\r\n";
        echo $object."\r\n";
        echo $description;

        $to = 'mariamkayantao@gmail.com';
        $subject = $object.' - '.$email;
        $message = $email.' - '.$description;

        wp_mail($to,$subject,$message);
    }
}

add_action('wp_head', 'contact_form_capture');
















?>
