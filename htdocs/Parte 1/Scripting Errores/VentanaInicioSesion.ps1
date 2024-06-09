# Muestra ventana emergente al iniciar sesino con las GPO

# Ventana de inicio de sesión
Add-Type -AssemblyName System.Windows.Forms
$form = New-Object System.Windows.Forms.Form
$form.Text = 'Inicio de sesión'
$form.Size = New-Object System.Drawing.Size(300,200)
$form.StartPosition = 'CenterScreen'

# Campos de usuario y contraseña
$labelUsuario = New-Object System.Windows.Forms.Label
$labelUsuario.Text = 'Usuario:'
$labelUsuario.Location = New-Object System.Drawing.Point(10,10)
$form.Controls.Add($labelUsuario)

$textBoxUsuario = New-Object System.Windows.Forms.TextBox
$textBoxUsuario.Location = New-Object System.Drawing.Point(100,10)
$form.Controls.Add($textBoxUsuario)

$labelContrasena = New-Object System.Windows.Forms.Label
$labelContrasena.Text = 'Contraseña:'
$labelContrasena.Location = New-Object System.Drawing.Point(10,40)
$form.Controls.Add($labelContrasena)

$textBoxContrasena = New-Object System.Windows.Forms.TextBox
$textBoxContrasena.Location = New-Object System.Drawing.Point(100,40)
$textBoxContrasena.PasswordChar = '*'
$form.Controls.Add($textBoxContrasena)

# Botón de inicio de sesión
$buttonIniciarSesion = New-Object System.Windows.Forms.Button
$buttonIniciarSesion.Text = 'Iniciar sesión'
$buttonIniciarSesion.Location = New-Object System.Drawing.Point(100,70)
$buttonIniciarSesion.Size = New-Object System.Drawing.Size(100,30)
$form.Controls.Add($buttonIniciarSesion)

# Acción del botón
$buttonIniciarSesion.Add_Click({
    $usuario = [System.Uri]::EscapeDataString($textBoxUsuario.Text)
    $contrasena = [System.Uri]::EscapeDataString($textBoxContrasena.Text)
    
    # Enviar credenciales al script PHP (ajusta la URL)
    $url = 'http://tu_servidor/validar_credenciales.php?usuario=' + $usuario + '&contrasena=' + $contrasena
    $response = Invoke-WebRequest -Uri $url
    
    # Manejo de la respuesta del servidor
    if ($response.Content -eq "Inicio de sesión exitoso") {
        [System.Windows.Forms.MessageBox]::Show("Inicio de sesión exitoso")
    } elseif ($response.Content -eq "Horas agotadas") {
        [System.Windows.Forms.MessageBox]::Show("Horas agotadas")
    } else {
        [System.Windows.Forms.MessageBox]::Show("Credenciales incorrectas")
    }
    
    $form.Close()
})

# Mostrar la ventana
$form.ShowDialog()
