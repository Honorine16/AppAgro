@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
set PATH=%PATH%;%USERPROFILE%\AppData\Roaming\Composer\vendor\bin
SET BIN_TARGET=%~dp0/patch-type-declarations
SET COMPOSER_RUNTIME_BIN_DIR=%~dp0
php "%BIN_TARGET%" %*
