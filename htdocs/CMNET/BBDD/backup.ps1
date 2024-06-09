# Obtener la fecha actual en formato AñoMesDia
$fecha = Get-Date -Format "yyyyMMdd"

# Ruta de la carpeta donde se guardarán las copias de seguridad
$rutaCarpeta = "C:\BACKUPS"

# Nombre del archivo de copia de seguridad con la fecha actual
$nombreArchivoBackup = $fecha + "_backup.sql"

# Verificar si la carpeta existe, si no existe, crearla
if (-not (Test-Path $rutaCarpeta)) {
    New-Item -Path $rutaCarpeta -ItemType Directory -Force
}

# Ruta al comando mysqldump
$rutaMysqldump = "C:\Program Files\MySQL\MySQL Server 8.0\bin\mysqldump.exe"

# Ejecutar el comando mysqldump para hacer la copia de seguridad
& $rutaMysqldump -u root -p1234 --routines --events --complete-insert --databases cmnet --add-drop-database --default-character-set=utf8mb4 > "$rutaCarpeta\$nombreArchivoBackup"
