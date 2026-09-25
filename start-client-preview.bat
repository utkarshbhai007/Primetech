@echo off
title Primetech Local Server & Ngrok Preview (Port 8008)
echo ====================================================
echo Starting Primetech Local Server & Client Preview (Port 8008)
echo ====================================================

REM Terminate any dangling ngrok process to prevent ERR_NGROK_334
taskkill /f /im ngrok.exe >nul 2>&1

start "Primetech PHP Server" "C:\xampp\php\php.exe" -S localhost:8008 router.php
timeout /t 2 /nobreak >nul

start "Ngrok Preview Tunnel" ngrok http 8008
timeout /t 3 /nobreak >nul

echo.
echo Preview link is live at:
echo https://undeeded-tamela-dialogically.ngrok-free.dev/
echo.
pause
