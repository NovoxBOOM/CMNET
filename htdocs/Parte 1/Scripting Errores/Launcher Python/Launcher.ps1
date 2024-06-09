# Lanza un archivo de Python ubicado en una carpeta compartida

# Ruta del archivo de Python en la unidad compartida
$pythonScriptPath = "\\CMNET-SP\scripts\test.py"

# Comando para ejecutar el script de Python
$pythonCommand = "python.exe $pythonScriptPath"

# Ejecutar el script de Python
Invoke-Expression -Command $pythonCommand
