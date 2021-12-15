<?php
$root1=$_SERVER['DOCUMENT_ROOT'];
include $root1.'./app/helpers/path.php';
include $root1.'./app/Database/db.php';
include $root1.'./app/controllers/users.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="theme-color" content="#111111" />
    <title>Filmlib</title>
    <link rel="stylesheet" href="/assets/scss/vendor.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src = " https://use.fontawesome.com/a6b6076a89.js " > </script>
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="/assets/scss/main.css" />
</head>

<body>
<?php include($root1.'./app/includes/admin_header.php');?>
<main id="main">
    <div class="container">
        <div class="modals">
            <div class="modal-overlay">
                <div class="modal modal--1" data-target="form-popup">
                    <div class="modal-header">
                        <h3 class="modal-header--title">Вход</h3>
                        <button class="modal-close btn">
                            <span class="MuiButton-label"><svg class="MuiSvgIcon-root c305" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path></svg></span>
                        </button>
                    </div>
                    <div class="modal-content">
                        <form  method="post" class="modal-content-form">
                            <!---
                            <div class="header-second--search input input-setting modal-content-form--item">
                                <input type="text" name="email" class="input-setting-field" placeholder="Логин" value="" required>
                            </div>
                            <div class="header-second--search input input-setting modal-content-form--item">
                                <input type="text" name="password" class="input-setting-field" placeholder="Пароль" value="" required>
                            </div>
                            -->
                            <a href="<?php echo BASE_URL?>login.php" class="btn modal-content-form-btn modal-content-form--item">
                                <span>Авторизоваться</span>
                            </a>
                            <div class="modal-content-form-buttons modal-content-form--item">
                                <a href="<?php echo BASE_URL?>reset.php" class="btn">
                                    <span>Забыл пароль</span>
                                </a>
                                <a href="<?php echo BASE_URL?>registration.php" class="btn">
                                    <span>Регистрация</span>
                                </a>
                            </div>
                            <input type="submit" name="btn-log" class="btn  modal-content-form-btn modal-content-form--item" value="Войти">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container1 ">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <a href="#" class="btn btn-sm btn-primary pull-left"><i class="fa fa-plus-circle"></i> Add New</a>
                                    <form class="form-horizontal pull-right">
                                        <div class="form-group">
                                            <label>Show : </label>
                                            <select class="form-control">
                                                <option>5</option>
                                                <option>10</option>
                                                <option>15</option>
                                                <option>20</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>View</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <ul class="action-list">
                                            <li><a href="#" class="btn btn-primary"><i class="far fa-edit"></i></a></li>
                                            <li><a href="#" class="btn btn-danger"><i class="fa fa-times"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>1</td>
                                    <td>Vincent Williamson</td>
                                    <td>31</td>
                                    <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul class="action-list">
                                            <li><a href="#" class="btn btn-primary"><i class="far fa-edit"></i></a></li>
                                            <li><a href="#" class="btn btn-danger"><i class="fa fa-times"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>2</td>
                                    <td>Taylor Reyes</td>
                                    <td>22</td>
                                    <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul class="action-list">
                                            <li><a href="#" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a></li>
                                            <li><a href="#" class="btn btn-danger"><i class="fa fa-times"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>3</td>
                                    <td>Justin Block</td>
                                    <td>26</td>
                                    <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul class="action-list">
                                            <li><a href="#" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a></li>
                                            <li><a href="#" class="btn btn-danger"><i class="fa fa-times"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>4</td>
                                    <td>Sean Guzman</td>
                                    <td>26</td>
                                    <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a></td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul class="action-list">
                                            <li><a href="#" class="btn btn-primary"><i class="fa fa-pencil-alt"></i></a></li>
                                            <li><a href="#" class="btn btn-danger"><i class="fa fa-times"></i></a></li>
                                        </ul>
                                    </td>
                                    <td>5</td>
                                    <td>Keith Carter</td>
                                    <td>24</td>
                                    <td><a href="#" class="btn btn-sm btn-success"><i class="fa fa-search"></i></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="panel-footer">
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">showing <b>5</b> out of <b>25</b> entries</div>
                                <div class="col-sm-6 col-xs-6">
                                    <ul class="pagination hidden-xs pull-right">
                                        <li><a href="#">«</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">»</a></li>
                                    </ul>
                                    <ul class="pagination visible-xs pull-right">
                                        <li><a href="#">«</a></li>
                                        <li><a href="#">»</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<? include ($root1.'./app/includes/footer.php')?>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="/assets/js/swiper.js"></script>
<script src="/assets/js/modal.js"></script>
</body>
</html>
