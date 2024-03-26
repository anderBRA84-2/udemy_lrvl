docker run
–rm
–net host
-e SONAR_HOST_URL=“http://localhost:9000”
-v /var/www/html/udemy_lrvl:/root/src
sonarsource/sonar-scanner-cli
-Dsonar.projectKey=udemy_lrvl_sonar
-Dsonar.sonar.projectName=udemy_lrvl_sonar
-Dsonar.sonar.projectVersion=1.0
-Dsonar.sonar.sourceEncoding=UTF-8
-Dsonar.sonar.host.url=http://localhost:9000
-Dsonar.login=sqp_376fd0b0d83dde6613698cebf8607e2363023bcf
