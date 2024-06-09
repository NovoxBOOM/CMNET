# Ruta del ensamblado MySQL
$path = "C:\Program Files (x86)\MySQL\MySQL Connector NET 8.4\MySql.Data.dll"

# Comprobar si el archivo existe
if (Test-Path -Path $path) {
    try {
        # Intentar cargar el ensamblado
        [System.Reflection.Assembly]::LoadFrom($path)
        Write-Host "El ensamblado MySql.Data.dll se ha cargado correctamente."
    } catch {
        Write-Host "Error al cargar el ensamblado MySql.Data.dll:"
        Write-Host $_.Exception.Message
        Write-Host $_.Exception.StackTrace
    }
} else {
    Write-Host "El archivo MySql.Data.dll no se encuentra en la ruta especificada: $path"
}
