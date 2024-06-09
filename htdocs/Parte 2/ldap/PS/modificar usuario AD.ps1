# Importar el módulo de Active Directory
Import-Module ActiveDirectory

# Cargar el ensamblado MySQL
$path = "C:\Program Files (x86)\MySQL\MySQL Connector NET 8.4\MySql.Data.dll"
[System.Reflection.Assembly]::LoadFrom($path)

# Configurar conexión a la base de datos
$serverName = "localhost"
$databaseName = "ldap"
$username = "root"
$password = "1234"

# Cadena de conexión a MySQL
$connectionString = "server=$serverName;uid=$username;pwd=$password;database=$databaseName"

# Función para obtener datos de la base de datos
function Get-UserData {
    $query = "SELECT * FROM formularioldap WHERE Puesto = 'PC01'"
    $connection = New-Object MySql.Data.MySqlClient.MySqlConnection
    $connection.ConnectionString = $connectionString
    $connection.Open()
    $command = $connection.CreateCommand()
    $command.CommandText = $query
    $reader = $command.ExecuteReader()

    $userData = @()
    while ($reader.Read()) {
        $userData += @{
            ID                = $reader["ID"]
            Numero            = $reader["Numero"]
            Clave             = $reader["Clave"]
            Puesto            = $reader["Puesto"]
            HoraInicio        = $reader["HoraInicio"]
            HoraFinal         = $reader["HoraFinal"]
            Nombre            = $reader["Nombre"]
            Apellidos         = $reader["Apellidos"]
            Descripcion       = $reader["Descripcion"]
            NumeroTelefono    = $reader["NumeroTelefono"]
            CorreoElectronico = $reader["CorreoElectronico"]
        }
    }
    $connection.Close()
    return $userData
}

# Obtener datos del usuario
$userData = Get-UserData

# Modificar usuario en Active Directory
foreach ($user in $userData) {
    $distinguishedName = "CN=$($user.Nombre + ' ' + $user.Apellidos),OU=Usuarios,OU=CMNET,DC=cmnet,DC=local"

    # Ejemplo de modificación de propiedades del usuario
    Set-ADUser -Identity $distinguishedName `
               -EmailAddress $user.CorreoElectronico `
               -OfficePhone $user.NumeroTelefono `
               -Title $user.Puesto `
               -Description $user.Descripcion

    Write-Host "Usuario $($user.Nombre) $($user.Apellidos) actualizado exitosamente."
}
