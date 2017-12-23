#Insert USUARIO
INSERT INTO `USUARIO` (`login`, `password`, `DNI`, `Nombre`, `Apellidos`, `Correo`, `Direccion`, `Telefono`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', '87654321X', 'Administrator', 'Admin Admin', 'admin@admin.com', 'here', '66666666');
INSERT INTO `USUARIO` (`login`, `password`, `DNI`, `Nombre`, `Apellidos`, `Correo`, `Direccion`, `Telefono`) VALUES
('alumno', 'c6865cf98b133f1f3de596a4a2894630', '88888888Y', 'User', 'User User', 'user@user.com', 'there', '66666666');

#Insert GRUPO
INSERT INTO `GRUPO`(`IdGrupo`, `NombreGrupo`, `DescripGrupo`) VALUES ("ADMINS","Grupo de Aministradores",
"Permite todas las funcionalidades del sitema");
INSERT INTO `GRUPO`(`IdGrupo`, `NombreGrupo`, `DescripGrupo`) VALUES ("ALUMNS","Grupo de Alumnos",
"Permite las funcionalidades del basicas del sitema");
INSERT INTO `GRUPO`(`IdGrupo`, `NombreGrupo`, `DescripGrupo`) VALUES ("MAXCAR","Grupo de CHARS",
"Permite las funcionalidades del basicas del sitema,Permite las funcionalidades del basicas de sitema");
INSERT INTO `GRUPO`(`IdGrupo`, `NombreGrupo`, `DescripGrupo`) VALUES ("TEST","Grupo de testers",
"Permite las funcionalidades del basicas del sitema,Permite las funcionalidades del basicas de sitema");


#Insert USU_GRUPO
INSERT INTO `USU_GRUPO`(`login`, `IdGrupo`) VALUES ("admin","ADMINS");
INSERT INTO `USU_GRUPO`(`login`, `IdGrupo`) VALUES ("alumno","ALUMNS");


#Insert FUNCIONALIDAD
INSERT INTO `FUNCIONALIDAD`(`IdFuncionalidad`, `NombreFuncionalidad`, `DescripFuncionalidad`) VALUES ("USERS","GESTIONAR USUARIOS","Permite administrar a los diferentes usuarios del sistema");
INSERT INTO `FUNCIONALIDAD`(`IdFuncionalidad`, `NombreFuncionalidad`, `DescripFuncionalidad`) VALUES ("GROUPS","GESTIONAR GRUPOS","Permite administrar a los diferentes grupos de usuarios del sistema");
INSERT INTO `FUNCIONALIDAD`(`IdFuncionalidad`, `NombreFuncionalidad`, `DescripFuncionalidad`) VALUES ("PERMIS","GESTIONAR PERMISOS","Permite administrar a los diferentes permisos del sistema");
INSERT INTO `FUNCIONALIDAD`(`IdFuncionalidad`, `NombreFuncionalidad`, `DescripFuncionalidad`) VALUES ("WORK","GESTIONAR TRABAJOS","Permite admisistrar a los diferentes trabajo existentes en el sistema");
INSERT INTO `FUNCIONALIDAD`(`IdFuncionalidad`, `NombreFuncionalidad`, `DescripFuncionalidad`) VALUES ("SCORE","GESTIONAR NOTAS","Permite admisistrar a las notas");



#Insert ACCION
INSERT INTO `ACCION`(`IdAccion`, `NombreAccion`, `DescripAccion`) VALUES ("ADD","Añadir","Privilegios de añadir nuevos elementos");
INSERT INTO `ACCION`(`IdAccion`, `NombreAccion`, `DescripAccion`) VALUES ("ACESS","Ver todos","Privilegios de ver a todos los elementos");
INSERT INTO `ACCION`(`IdAccion`, `NombreAccion`, `DescripAccion`) VALUES ("EDIT","Modificar","Privilegios de modificar los elementos existentes");
INSERT INTO `ACCION`(`IdAccion`, `NombreAccion`, `DescripAccion`) VALUES ("DELETE","Borrar","Privilegios de borrar los elementos existentes");
INSERT INTO `ACCION`(`IdAccion`, `NombreAccion`, `DescripAccion`) VALUES ("SEARCH","Buscar","Privilegios de buscar los elementos existentes");
INSERT INTO `ACCION`(`IdAccion`, `NombreAccion`, `DescripAccion`) VALUES ("ASSING","Gestionar Grupo",
"Privilegios de ver, asignar o eliminar de un grupo existente a un usuario");
INSERT INTO `ACCION`(`IdAccion`, `NombreAccion`, `DescripAccion`) VALUES ("SEND","Enviar","Privilegios de editar una entrega");
INSERT INTO `ACCION`(`IdAccion`, `NombreAccion`, `DescripAccion`) VALUES ("SEE","Ver entrega","Privilegios de ver una entrega");


#Indica que acciones possee cada funcionalidad
#Insert FUNC_ACCION
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("USERS","ADD");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("USERS","ACESS");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("USERS","EDIT");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("USERS","DELETE");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("USERS","SEARCH");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("USERS","ASSING");

INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("GROUPS","ADD");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("GROUPS","ACESS");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("GROUPS","EDIT");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("GROUPS","DELETE");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("GROUPS","SEARCH");

INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("PERMIS","ACESS");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("PERMIS","SEARCH");

INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("WORK","ADD");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("WORK","ACESS");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("WORK","EDIT");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("WORK","DELETE");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("WORK","SEARCH");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("WORK","SEND");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("WORK","SEE");

INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("SCORE","ADD");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("SCORE","ACESS");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("SCORE","EDIT");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("SCORE","DELETE");
INSERT INTO `FUNC_ACCION`(`IdFuncionalidad`, `IdAccion`) VALUES ("SCORE","SEARCH");




#Insert PERMISO
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","USERS","ADD");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","USERS","ACESS");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","USERS","EDIT");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","USERS","DELETE");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","USERS","SEARCH");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","USERS","ASSING");

INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","GROUPS","ADD");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","GROUPS","ACESS");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","GROUPS","EDIT");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","GROUPS","DELETE");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","GROUPS ","SEARCH");

INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","WORK","ADD");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","WORK","ACESS");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","WORK","EDIT");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","WORK","DELETE");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","WORK ","SEARCH");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","WORK","SEND");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","WORK ","SEE");


INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","PERMIS","ACESS");
INSERT INTO `PERMISO`(`IdGrupo`, `IdFuncionalidad`, `IdAccion`) VALUES ("ADMINS","PERMIS ","SEARCH");