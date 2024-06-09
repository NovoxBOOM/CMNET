import tkinter as tk

def verificar_valores():
    valor1 = campo1.get()
    valor2 = campo2.get()

    if valor1 == 'hola' and valor2 == 'adios':
        resultado_label.config(text="BIEN")
    else:
        resultado_label.config(text="MAL")

# Crear la ventana
ventana = tk.Tk()
ventana.title("Verificación de valores")

# Crear etiquetas y campos de entrada
etiqueta1 = tk.Label(ventana, text="Campo 1:")
etiqueta1.grid(row=0, column=0, padx=10, pady=5)

campo1 = tk.Entry(ventana)
campo1.grid(row=0, column=1, padx=10, pady=5)

etiqueta2 = tk.Label(ventana, text="Campo 2:")
etiqueta2.grid(row=1, column=0, padx=10, pady=5)

campo2 = tk.Entry(ventana)
campo2.grid(row=1, column=1, padx=10, pady=5)

# Botón para verificar los valores
boton_verificar = tk.Button(ventana, text="Verificar", command=verificar_valores)
boton_verificar.grid(row=2, column=0, columnspan=2, padx=10, pady=5)

# Etiqueta para mostrar el resultado
resultado_label = tk.Label(ventana, text="")
resultado_label.grid(row=3, column=0, columnspan=2, padx=10, pady=5)

# Ejecutar la ventana
ventana.mainloop()