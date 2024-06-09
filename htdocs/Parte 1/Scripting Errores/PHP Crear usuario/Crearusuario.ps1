# Crea el Usuario con los parametros del formulario en Active Directory

param (
    [string]$givenname,
    [string]$surname,
    [string]$email,
    [string]$phone
)
# Configura los detalles de la cuenta del nuevo usuario
$UserAccount = @{
    GivenName   = $givenname
    Surname     = $surname
    Name        = "$givenname $surname"
    DisplayName = "$givenname $surname"
    UserPrincipalName = "$givenname.$surname@CMNET.com" # Cambia domain.com por tu dominio real
    SamAccountName = "$givenname.$surname"
    Path     = "OU=CMNET,DC=CMNET,DC=local" # Cambia esta ruta por la ruta correcta en tu AD
    AccountPassword = (ConvertTo-SecureString -AsPlainText "P@ssw0rd123" -Force) # Cambia esta contraseña por una política segura
    Enabled     = $true
    EmailAddress = $email
    OfficePhone = $phone
}
# Importa el módulo de Active Directory
Import-Module ActiveDirectory

# Crea el nuevo usuario
try {
    New-ADUser @UserAccount -PassThru
    Write-Output "Usuario $givenname $surname creado exitosamente."
} catch {
    Write-Error "Error al crear el usuario: $_"
}
