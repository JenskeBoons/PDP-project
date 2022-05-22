<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="shortcut icon" href="fotos/Untitled-2.ico" type="image/x-icon">
    <title>Contacteer ons</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="contact.css">
</head>

<body class="bg-dark text-white d-flex flex-column min-vh-100">

<!--    <a href="index.html"> <img src="fotos/bsl-black-croped.svg" class="position-absolute top-0 start-0 m-2 logo" id="logo"></a>-->

    <div class="container">

        <section class="section">

            <h2 class="section-heading h1 pt-4">Contacteer ons</h2>
            <p class="section-description">Wij zijn altijd bereid om een afgestemde, klantvriendelijke installatie te bespreken.
                Een bericht hieronder achterlaten en een voorafgaande telefonische afspraak is dan ook wenselijk om een professionele samenwerking te kunnen garanderen.</p>
            <p>Voor offerteaanvragen betreffende licht- en geluidsinstallaties kan u steeds terecht bij onderstaande contactgegevens.</p>

            <div class="row">

                <div class="col-md-8 col-xl-9">
                    <form id ="contact-form" name="contact-form" action="mail.php" method="POST"  onsubmit="return validateForm()" >

                        <div class="row">

                            <div class="col-md-6 p-3">
                                <div class="md-form">
                                    <div class="md-form">
                                        <input type="text" id="name" placeholder="Uw naam" name="name" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 p-3">
                                <div class="md-form">
                                    <div class="md-form">
                                        <input type="text" id="email" placeholder="Uw email" name="email" class="form-control">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 p-3">
                                <div class="md-form">
                                    <input type="text" id="subject" placeholder="Onderwerp" name="subject" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="p-3">

                                <div class="md-form">
                                    <textarea type="text" id="message" placeholder="Uw bericht" name="message" class="md-textarea col-12"></textarea>
                                </div>

                            </div>
                        </div>

                    </form>

                    <div class="center-on-small-only p-t-3">
                        <a class="btn btn-primary" onclick="validateForm()">Verzenden</a>
                    </div> <div class="status" id="status"></div>
                </div>

                <div class="col-md-4 col-xl-3">
                    <ul class="contact-icons">
                        <li>
                            <a href="index.html" class="text-decoration-none text-white"><i class="fas fa-home fa-2x"></i></a>
                            <p><a href="index.html" class="text-decoration-none text-white">Naar de homepagina</a></p>
                        </li>

                        <li><a href="tel:0476-29-40-35" class="text-decoration-none text-white"><i class="fa fa-phone fa-2x"></i></a>
                            <p><a href="tel:0476-29-40-35" class="text-decoration-none text-white">0476-29 40 35</a></p>
                        </li>

                        <li >
                            <a href = "mailto: info@bsl.be" class="text-decoration-none text-white"><i class="fa fa-envelope fa-2x"></i></a>
                            <p><a href = "mailto: info@bsl.be" class="text-decoration-none text-white">info@bsl.be</a></p>
                        </li>
                    </ul>
                </div>

            </div>

        </section>

    </div>

    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top m-4 mt-auto">
        <p class="col-md-4 mb-0 text-muted">© 2022 bsl.be</p>
        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="index.html" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="index.php" class="nav-link px-2 text-muted">Contact</a></li>
            <li class="nav-item"><a href="index.html#palmers" class="nav-link px-2 text-muted">over ons</a></li>
            <li class="nav-item"><a href="index.html#verhuur" class="nav-link px-2 text-muted">verhuur</a></li>
            <li class="nav-item"><a href="index.html#pa&ld" class="nav-link px-2 text-muted">PA & LD</a></li>
        </ul>
    </footer>


    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>

        function validateForm() {
            //get input field values data to be sent to server
            document.getElementById('status').innerHTML = "Sending...";
            formData = {
                'name'     : $('input[name=name]').val(),
                'email'    : $('input[name=email]').val(),
                'subject'  : $('input[name=subject]').val(),
                'message'  : $('textarea[name=message]').val()
            };


            $.ajax({
                url : "mail.php",
                type: "POST",
                data : formData,
                success: function(data, textStatus, jqXHR)
                {

                    $('#status').text(data.message);
                    if (data.code) //If mail was sent successfully, reset the form.
                        $('#contact-form').closest('form').find("input[type=text], textarea").val("");
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    $('#status').text(jqXHR);
                }
            });

        }
    </script>
</body>

</html>