@echo off
title Ngrok Live Client Preview (Port 8008)
echo =======================================================
echo Starting Ngrok Live Preview Tunnel on Port 8008...
echo =======================================================
echo.

REM Automatically close any orphaned ngrok processes to prevent ERR_NGROK_334 (endpoint already online)
taskkill /f /im ngrok.exe >nul 2>&1

echo Make sure your local PHP server on port 8008 is running!
echo (Run start-local-server.bat if it is not already running)
echo.
echo Your public preview link:
echo https://undeeded-tamela-dialogically.ngrok-free.dev/
echo.
echo Connecting tunnel to localhost:8008 ...
echo (Keep this window open while you or your client are viewing the site)
echo =======================================================
echo.

ngrok http 8008

echo.
echo =======================================================
echo Ngrok tunnel has stopped.
echo =======================================================
pause
