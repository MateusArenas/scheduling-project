# resolve MySQL not run in xammp
vai em gerenciador de tarefas e finaliza as tarefas de mysql depois starta o mysql no xampp.

# CREATE MIGRATION
$ cd .\src\Api
$ ../../vendor/bin/phinx create MyFirstMigration -c config-phinx.php

# RUN MIGRATION
$ ../../vendor/bin/phinx migrate -c config-phinx.php
