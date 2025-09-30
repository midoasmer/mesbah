@echo off
echo Copying images from storage to public/uploads...
xcopy "storage\app\public\products\*.jpg" "public\uploads\products\" /Y
echo Images copied successfully!
pause
