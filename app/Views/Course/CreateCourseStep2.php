<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Course</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="<?php echo base_url('assets/course/step2/fonts/material-icon/css/material-design-iconic-font.min.css'); ?>" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo base_url('assets/course/step2/vendor2/nouislider/nouislider.min.css'); ?>" type="text/css" media="screen">

    <!-- Main css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/course/step2/css/style.css'); ?>" type="text/css" media="screen">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" rel="preconnect"></script>
    <script src="https://cdn.tiny.cloud/1/js76qyi19edy15b7redb48ihbx9clxwbtiq6igcwwzog8lwf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- Css for form upload -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">

    <script>
        tinymce.init({
            selector: 'textarea',
            toolbar: 'bold italic | bullist  numlist ',
            menubar: false,
            height: 150,
            width: 680,
            plugins: [
                'advlist  lists image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code  wordcount'
            ],
        });
    </script>
</head>


<body>

    <div class="main">

        <div class="container">
            <form method="POST" id="signup-form" class="signup-form" action="#">
                <div>
                    <?php
                    $this->session = \Config\Services::session();
                    if (session('correct')) : ?>
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Workgress!</strong> <?php echo session('correct') ?>
                        </div>
                    <?php
                    elseif (session('incorrect')) : ?>
                        <div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Workgress!</strong> <?php echo session('incorrect') ?>
                        </div>
                    <?php
                    elseif (session('warning')) : ?>
                        <div class="alert alert-warning" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Workgress!</strong> <?php echo session('warning') ?>
                        </div>
                    <?php
                    endif
                    ?>
                    <h3>หลักสูตร</h3>
                    <fieldset>
                        <h2>หลักสูตร</h2>
                        <p class="desc">เริ่มต้นรวมหลักสูตรของคุณเข้าด้วยกันด้วยการสร้างส่วน การบรรยาย และแบบฝึกหัด (โจทย์ แบบฝึกหัดการเขียนโค้ด และงานที่ได้รับมอบหมาย)</p>
                        <div class="fieldset-content">
                            <div class="form-row">
                                <label class="form-label">ส่วนที่ 1 บทนำ</label>
                                <div class="form-flex">
                                    <div class="form-group">
                                        <input type="text" name="first_name" id="first_name" />
                                        <span class="text-input">First</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" />
                                <span class="text-input">Example :<span> Jeff@gmail.com</span></span>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" name="phone" id="phone" />
                            </div>
                            <div class="form-date">
                                <label for="birth_date" class="form-label">Birth Date</label>
                                <div class="form-date-group">
                                    <div class="form-date-item">
                                        <select id="birth_month" name="birth_month"></select>
                                        <span class="text-input">MM</span>
                                    </div>
                                    <div class="form-date-item">
                                        <select id="birth_date" name="birth_date"></select>
                                        <span class="text-input">DD</span>
                                    </div>
                                    <div class="form-date-item">
                                        <select id="birth_year" name="birth_year"></select>
                                        <span class="text-input">YYYY</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="ssn" class="form-label">SSN</label>
                                <input type="text" name="ssn" id="ssn" />
                            </div>
                            <div class="form-group">
                                <label for="ssn" class="form-label">SSN</label>
                                <input type="text" name="ssn" id="ssn" />
                            </div>
                            <div class="form-group">
                                <label for="ssn" class="form-label">SSN</label>
                                <input type="text" name="ssn" id="ssn" />
                            </div>
                            <div class="form-group">
                                <label for="ssn" class="form-label">SSN</label>
                                <input type="text" name="ssn" id="ssn" />
                            </div>
                            <div class="form-group">
                                <label for="ssn" class="form-label">SSN</label>
                                <input type="text" name="ssn" id="ssn" />
                            </div>
                            <div class="form-group">
                                <label for="ssn" class="form-label">SSN</label>
                                <input type="text" name="ssn" id="ssn" />
                            </div>
                            <div class="form-group">
                                <label for="ssn" class="form-label">SSN</label>
                                <input type="text" name="ssn" id="ssn" />
                            </div>
                            <div class="form-group">
                                <label for="ssn" class="form-label">SSN</label>
                                <input type="text" name="ssn" id="ssn" />
                            </div>


                        </div>
                    </fieldset>


                    <h3>หน้าเริ่มต้นของหลักสูตร</h3>
                    <fieldset>
                        <h2>หน้าเริ่มต้นของหลักสูตร</h2>
                        <div class="form-find">
                            <p class="desc">Please enter your infomation and proceed to next step so we can build your
                                account</p>
                        </div>
                        <div class="fieldset-content">
                            <div class="form-group">
                                <label for="find_bank" class="form-label">ชื่อหลักสูตร</label>
                                <input type="text" name="find_bank" id="find_bank" placeholder="ใส่ชื่อหลักสูตรของคุณ" maxlength="60" />
                            </div>
                            <div class="form-group">
                                <label for="find_bank" class="form-label">คำอธิบายหลักสูตร</label>
                                <textarea placeholder="ใส่คำอธิบายของหลักสูตรคุณ">
                                    </textarea>
                            </div>
                            <div class="form-group-image">
                                <label for="image" class="form-label">ภาพหลักสูตร</label>
                                <div class="row">
                                    <div class="main-image">
                                        <img data-purpose="image-preview" alt="ภาพหลักสูตร" width="491" height="276" src="<?php echo base_url('assets/img/pre-image.png'); ?>">
                                    </div>

                                    <div class="main-text">
                                        <p>อัพโหลดรูปภาพหลักสูตรของคุณที่นี่ ภาพจะต้องตรงกับ มาตรฐานคุณภาพรูปภาพของเรา จึงจะใช้ได้ แนวทางสำคัญ: <b> 750x422 </b> พิกเซล ในรูปแบบ .jpg, .jpeg,. gif หรือ .png.
                                            โดยไม่มีข้อความบนรูปภาพ</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group-image">
                                <label for="image" class="form-label">วิดีโอโปรโมชั่น</label>
                                <div class="row">
                                    <div class="main-image">
                                        <img data-purpose="image-preview" alt="ภาพหลักสูตร" width="491" height="276" src="<?php echo base_url('assets/img/pre-image.png'); ?>">
                                    </div>

                                    <div class="main-text">
                                        <p>ผู้เรียนที่ได้ชมวิดีโอส่งเสริมการขายที่ผลิตอย่างดี มีแนวโน้มที่จะลงทะเบียนเพิ่มขึ้น 5 เท่า ในหลักสูตรของคุณ เราเห็นสถิติเพิ่มขึ้นถึง 10 เท่า สำหรับวิดีโอที่ทำได้อย่างดีเยี่ยม! </p>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </fieldset>

                    <h3>การกำหนดราคา</h3>
                    <fieldset>
                        <h2>Set Financial Goals</h2>
                        <p class="desc">Set up your money limit to reach the future plan</p>
                        <div class="fieldset-content">
                            <div class="donate-us">
                                <div class="price_slider ui-slider ui-slider-horizontal">
                                    <div id="slider-margin"></div>
                                    <p class="your-money">
                                        Your money you can spend per month :
                                        <span class="money" id="value-lower"></span>
                                        <span class="money" id="value-upper"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </form>


        </div>
</body>
<!-- JS -->
<script src="<?php echo base_url('assets/course/step2/vendor2/jquery-validation/dist/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/vendor2/jquery-validation/dist/additional-methods.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/vendor2/jquery-steps/jquery.steps.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/vendor2/minimalist-picker/dobpicker.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/vendor2/nouislider/nouislider.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/vendor2/wnumb/wNumb.js'); ?>"></script>
<script src="<?php echo base_url('assets/course/step2/js/main.js'); ?>"></script>

</html>