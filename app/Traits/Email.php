<?php

namespace App\Traits;

trait Email
{
    private $controller;

    public function emailInit($state, $data)
    {
        $this->controller = $this->getController($state);
        if (env('APP_LOG_LEVEL') == "debug") {
            \Log::info('Controller Email: '.$this->controller);
        }

        return $this->sent($state, $data);
    }

    public function getController($state)
    {
        switch ($state) {
            case 'contact':
                    return 'App\Mail\ContactEmail';
                break;
            case 'startup':
                    return 'App\Mail\StartupEmail';
                break;
            default:
                \Log::error('An error occured while get controller in email traits.');
                throw new \Exception('An error occured while get controller in email traits.', 500);
                break;
        }
    }

    public function getInternalEmail($state)
    {
        if (env('MAIL_ENV_TEST') == true) {
            return env('MAIL_REDIRECT');
        }
        switch ($state) {
                case 'contact':
                        return 'contact.intern@wedigital.garden';
                    break;
                case 'startup':
                        return 'taguirre@wedigital.garden';
                    break;
                default:
                    \Log::error('An error occured while get controller in email traits.');
                    throw new \Exception('An error occured while get controller in email traits.', 500);
                    break;
            }
    }

    public function sent($state, $data)
    {
        $internalMail = $this->getInternalEmail($state);

        $mail = new $this->controller($data);

        if (!is_null($internalMail)) {
            if (env('APP_LOG_LEVEL') == "debug") {
                \Log::info("Step 2/4 : Sending internal emails");
            }
            try {
                $res = \Mail::to($internalMail)->send($mail);
                if (env('APP_LOG_LEVEL') == "debug") {
                    \Log::info("Internal email has been send...");
                }
            } catch (\Exception $e) {
                throw new \Exception('Mail not sent', 503);
            }
        }
        
        return true;
    }

}
