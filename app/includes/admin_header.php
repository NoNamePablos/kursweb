
<header id="header">
    <div class="header">
        <div class="header-navigation">
            <a
                href="<?php echo BASE_URL?>index.php"
                class="header-logo header-svg header-nav--item"
            >
                <svg
                    class="header-logo-ico"
                    focusable="false"
                    viewBox="0 0 496 512"
                    aria-hidden="true"
                    role="presentation"
                >
                    <path
                        fill="currentColor"
                        d="M248 8C111.03 8 0 119.03 0 256s111.03 248 248 248 248-111.03 248-248S384.97 8 248 8zm0 376c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32zm0-128c-53.02 0-96 42.98-96 96s42.98 96 96 96c-106.04 0-192-85.96-192-192S141.96 64 248 64c53.02 0 96 42.98 96 96s-42.98 96-96 96zm0-128c-17.67 0-32 14.33-32 32s14.33 32 32 32 32-14.33 32-32-14.33-32-32-32z"
                    ></path>
                </svg>
            </a>
        </div>
        <div class="header-second">
            <div class="header-second--search input input-setting is-hidden">
                <input type="text" class="input-setting-field" placeholder="Логин" value="">
            </div>
            <button class="header-second-theme">
                <svg class="theme-light header-logo-ico" focusable="false" viewBox="0 0 24 24" aria-hidden="true" role="presentation"><path d="M10 2c-1.82 0-3.53.5-5 1.35C7.99 5.08 10 8.3 10 12s-2.01 6.92-5 8.65C6.47 21.5 8.18 22 10 22c5.52 0 10-4.48 10-10S15.52 2 10 2z"></path></svg>
            </button>

            <?php if (isset($_SESSION['id'])): ?>
                <div class="header-second-user--active ">
              <span class="header-second-user--active-login">
                  <?php echo $_SESSION['login'];?>
              </span>
                    <div class="header-second-user--active-login--list">
                        <a href="/logout.php" class="header-second-user--active-login--item">Выйти</a>
                    </div>
                </div>
            <?php  endif;?>
  
        </div>
    </div>
    </div>
</header>
