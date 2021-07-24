<?php

namespace mglaman\DrupalOrgCli;

trait NotificationTrait
{

    protected function sendNotification(string $title, string $message): void
    {
        switch (PHP_OS) {
            case 'Darwin':
                exec(
                    "osascript -e 'display notification \"$message\" with title \"$title\"'"
                );
                break;

            case 'Linux':
                // This is actually only Ubuntu.
                exec("notify-send $message");
                break;
        }
    }
}
