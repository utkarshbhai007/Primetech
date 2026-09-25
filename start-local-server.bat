@echo off
echo Starting Primetech local development server on http://localhost:8008 ...
start http://localhost:8008
"C:\xampp\php\php.exe" -S localhost:8008 router.php
pause
