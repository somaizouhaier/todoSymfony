<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/hello')) {
            // ztn_todo_homepage
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ztn_todo_homepage')), array (  '_controller' => 'ztn\\TodoBundle\\Controller\\DefaultController::indexAction',));
            }

            // ztn_service_homepage
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'ztn_service_homepage')), array (  '_controller' => 'ztn\\ServiceBundle\\Controller\\DefaultController::indexAction',));
            }

        }

        // zou_utilisateur_compte
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'zou_utilisateur_compte');
            }

            return array (  '_controller' => 'ztn\\UtilisateurBundle\\Controller\\SecurityController::loginAction',  '_route' => 'zou_utilisateur_compte',);
        }

        // zou_utilisateur_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'zou_utilisateur_homepage')), array (  '_controller' => 'ztnUtilisateurBundle:Default:index',));
        }

        if (0 === strpos($pathinfo, '/inscri')) {
            // ztn_utilisateur_inscrieFacebook
            if ($pathinfo === '/inscrieFacebook') {
                return array (  '_controller' => 'ztn\\UtilisateurBundle\\Controller\\UtilisateurController::inscrieFacebookAction',  '_route' => 'ztn_utilisateur_inscrieFacebook',);
            }

            // ztn_utilisateur_registration_register
            if ($pathinfo === '/inscription') {
                return array (  '_controller' => 'ztn\\UtilisateurBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'ztn_utilisateur_registration_register',);
            }

        }

        if (0 === strpos($pathinfo, '/c')) {
            // ztn_utilisateur_registration_check_email
            if ($pathinfo === '/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_ztn_utilisateur_registration_check_email;
                }

                return array (  '_controller' => 'ztn\\UtilisateurBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'ztn_utilisateur_registration_check_email',);
            }
            not_ztn_utilisateur_registration_check_email:

            if (0 === strpos($pathinfo, '/confirm')) {
                // ztn_utilisateur_registration_confirm
                if (preg_match('#^/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_ztn_utilisateur_registration_confirm;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'ztn_utilisateur_registration_confirm')), array (  '_controller' => 'ztn\\UtilisateurBundle\\Controller\\RegistrationController::confirmAction',));
                }
                not_ztn_utilisateur_registration_confirm:

                // ztn_utilisateur_registration_confirmed
                if ($pathinfo === '/confirmed') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_ztn_utilisateur_registration_confirmed;
                    }

                    return array (  '_controller' => 'ztn\\UtilisateurBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'ztn_utilisateur_registration_confirmed',);
                }
                not_ztn_utilisateur_registration_confirmed:

            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // ztn_utilisateur_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'ztn\\UtilisateurBundle\\Controller\\SecurityController::loginAction',  '_route' => 'ztn_utilisateur_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/resetting')) {
            // fos_user_resetting_request
            if ($pathinfo === '/resetting/request') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_request;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
            }
            not_fos_user_resetting_request:

            // fos_user_resetting_send_email
            if ($pathinfo === '/resetting/send-email') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_fos_user_resetting_send_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
            }
            not_fos_user_resetting_send_email:

            // fos_user_resetting_check_email
            if ($pathinfo === '/resetting/check-email') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_resetting_check_email;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
            }
            not_fos_user_resetting_check_email:

            // fos_user_resetting_reset
            if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_resetting_reset;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
            }
            not_fos_user_resetting_reset:

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
