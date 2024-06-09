# Fuerza el Inicio de Sesion automatico a traves de las GPO

# Definir los detalles de inicio de sesión
$UserName = "pc01"  # Sustituye con el nombre de usuario real
$Password = "Berny123."  # Sustituye con la contraseña real
$DomainName = "CMNET.local"  # Asegúrate de que el dominio está correctamente especificado

# Convertir la contraseña a SecureString y luego a texto plano
$SecurePassword = ConvertTo-SecureString $Password -AsPlainText -Force
$BSTR = [System.Runtime.InteropServices.Marshal]::SecureStringToBSTR($SecurePassword)
$UnsecurePassword = [System.Runtime.InteropServices.Marshal]::PtrToStringAuto($BSTR)

# Verificar que no estemos ejecutando en vacío
if (-not $UnsecurePassword) {
    Write-Host "La conversión de la contraseña ha fallado."
    exit
}

# Configurar las propiedades de inicio de sesión automático en el registro
try {
    Set-ItemProperty -Path "HKLM:\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon" -Name "AutoAdminLogon" -Value "1"
    Set-ItemProperty -Path "HKLM:\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon" -Name "DefaultUserName" -Value $UserName
    Set-ItemProperty -Path "HKLM:\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon" -Name "DefaultPassword" -Value $UnsecurePassword
    Set-ItemProperty -Path "HKLM:\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon" -Name "DefaultDomainName" -Value $DomainName
    Write-Host "Auto login has been configured for $UserName on $DomainName."
} catch {
    Write-Host "Error configurando el inicio de sesión automático: $_"
}