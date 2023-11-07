<?php
                        session_start();
                        if (isset($_SESSION["sess_user"])) {
                            session_destroy();
                            header('Location: home.php');
                        } else {
                            header('Location: index.php');
                        }
