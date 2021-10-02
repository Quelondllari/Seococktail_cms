<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* @admin/login.html */
class __TwigTemplate_18a6101c2cd98333380047835646aaf7603a6968601e783564f2805536947f12 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<section class=\"login_page\">
    <div class=\"ln_pe_in\">
        <div class=\"ln_in_cnt\">
            <img src=\"/sc_admin/assets/img/logo-white.png\" class=\"ln_pe_lg\" alt=\"Seococktail CMS\">
            <h1 class=\"ln_pe_tl\">Вход в панель</h1>
            <hr class=\"hr_line\">
            <form action=\"/sc_admin/actions/sc_login.php\" data-typeform=\"sc_login\" method=\"POST\" id=\"sc_login_form\" class=\"ln_in_frm sc_form\">
                <!-- Логин -->
                <label class=\"frm_gr\" for=\"sc_fm_login\">
                    <span class=\"frm_gr_tl\">Логин</span>
                    <input type=\"text\" class=\"frm_gr_inp\" id=\"sc_fm_login\" name=\"sc_form[Login][check]\" placeholder=\"Введите логин\">
                    <div class=\"frm_gr_err\">
<!--                        Не указан логин!-->
                    </div>
                </label>
                <!-- Пароль -->
                <label class=\"frm_gr\" for=\"sc_fm_password\">
                    <span class=\"frm_gr_tl\">Пароль<sup class=\"frm_gr_ht\"><a href=\"#?\">Забыли пароль?</a></sup></span>
                    <input type=\"password\" class=\"frm_gr_inp\" id=\"sc_fm_password\" name=\"sc_form[Password]\" placeholder=\"Введите пароль\">
                    <div class=\"frm_gr_err\">
<!--                        Не введен пароль!-->
                    </div>
                </label>
                <!-- Войти -->
                <button class=\"btn ln_in_btn\" type=\"submit\">
                    <i class=\"fal fa-cocktail\"></i> Войти
                </button>
            </form>
            <hr class=\"hr_line\">
        </div>
    </div>
</section>";
    }

    public function getTemplateName()
    {
        return "@admin/login.html";
    }

    public function getDebugInfo()
    {
        return array (  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<section class=\"login_page\">
    <div class=\"ln_pe_in\">
        <div class=\"ln_in_cnt\">
            <img src=\"/sc_admin/assets/img/logo-white.png\" class=\"ln_pe_lg\" alt=\"Seococktail CMS\">
            <h1 class=\"ln_pe_tl\">Вход в панель</h1>
            <hr class=\"hr_line\">
            <form action=\"/sc_admin/actions/sc_login.php\" data-typeform=\"sc_login\" method=\"POST\" id=\"sc_login_form\" class=\"ln_in_frm sc_form\">
                <!-- Логин -->
                <label class=\"frm_gr\" for=\"sc_fm_login\">
                    <span class=\"frm_gr_tl\">Логин</span>
                    <input type=\"text\" class=\"frm_gr_inp\" id=\"sc_fm_login\" name=\"sc_form[Login][check]\" placeholder=\"Введите логин\">
                    <div class=\"frm_gr_err\">
<!--                        Не указан логин!-->
                    </div>
                </label>
                <!-- Пароль -->
                <label class=\"frm_gr\" for=\"sc_fm_password\">
                    <span class=\"frm_gr_tl\">Пароль<sup class=\"frm_gr_ht\"><a href=\"#?\">Забыли пароль?</a></sup></span>
                    <input type=\"password\" class=\"frm_gr_inp\" id=\"sc_fm_password\" name=\"sc_form[Password]\" placeholder=\"Введите пароль\">
                    <div class=\"frm_gr_err\">
<!--                        Не введен пароль!-->
                    </div>
                </label>
                <!-- Войти -->
                <button class=\"btn ln_in_btn\" type=\"submit\">
                    <i class=\"fal fa-cocktail\"></i> Войти
                </button>
            </form>
            <hr class=\"hr_line\">
        </div>
    </div>
</section>", "@admin/login.html", "C:\\OpenServer\\domains\\SEOCocktail\\sc_admin\\views\\login.html");
    }
}
