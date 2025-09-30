@echo off
echo Creating storage link...
mklink /D "public\storage\products" "storage\app\public\products"
echo Storage link created successfully!
pause
