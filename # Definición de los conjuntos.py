# Definición de los conjuntos
A = {4, 13, 27, 33, 21, 42, 16, 37, 5, 7, 18, 34, 64}
B = {15, 26, 17, 5, 32, 14, 52, 3, 45, 24, 16, 54}
C = {2, 5, 7, 16, 24, 35, 23, 32, 52, 9, 10, 59, 27, 22}
D = {9, 26, 33, 17, 14, 25, 64, 53, 57, 52, 13, 5, 18, 24}

# Crear un conjunto universal que contenga todos los elementos
universal_set = A.union(B).union(C).union(D)

# Calcular los complementos
A_complement = universal_set - A
B_complement = universal_set - B
C_complement = universal_set - C
D_complement = universal_set - D

# Calcular las intersecciones necesarias
intersection_A_complement_D = A_complement.intersection(D)
intersection_C_complement_B_complement = C_complement.intersection(B_complement)

# Calcular la intersección final
result = intersection_A_complement_D.intersection(intersection_C_complement_B_complement)

# Mostrar el resultado
print("El resultado de (A'∩D) ∩ (C'∩B') es:", result)

