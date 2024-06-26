<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | YUMMY</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="icon" type="image.x-icon" href="../images/index/Logo Files/For Web/Favicons/browser.png">
    <link rel="stylesheet" href="../css/contactUs.css">
	<!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
        $(document).ready(function(){
            $('#contactForm').submit(function(event){           
               alert('Form submitted successfully!'); // Show alert
            });
        });
    </script>
</head>
<body>
    <section class="contact">
        <div class="content">
            <h2>Contact Us</h2>
            <p>Have a question or want to learn more about our design services? We'd love to hear from you. Feel free to reach out via the contact form below, or use any of the other contact methods listed.</p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Address</h3>
						<p>100 Jalan YUMMY,<br>Taman YUMMY, <br>81000 Kulai, Johor</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>+60 167114514</p>
                        <p>+60 125569909</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>yummy_cs@yummy.com</p>
                        <p>yummy_official@yummy.com</p>
                    </div>
                </div>
            </div>
            <div class="contactForm">
                <form id="contactForm" action="contactUs.php" method="post">
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" id="name" name="name" required="required" placeholder="">
						<span class="label">Name</span>
                        <span class="error" id="nameErr"></span>
                    </div>
                    <div class="inputBox">
                        <input type="email" id="email" name="email" required="required" placeholder="">
                        <span class="label">Email</span>
						<span class="error" id="emailErr"></span>
                    </div>
                    <div class="inputBox">
                        <textarea id="message" name="message" required="required" placeholder=""></textarea>
						<span class="label">Type your message...</span>                        
						<span class="error" id="messageErr"></span>
                    </div>     
                    <div class="inputBox">
                        <button onclick="history.back()">Back</button>
                        <input type="submit" name="create" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>
</html>