create database agenda_web;

use agenda_web;

create table users(
    IDUsuario int primary key,
    NombreU varchar (12),
    ApellidoPaternoU varchar (12),
    ApellidoMaternoU varchar (12),
    Correo varchar (76),
    Pass varchar (6),
    Rol int
);

create table escuela(
    IDEscuela int primary key,
    IDUsuario int,
    NombreEscuela varchar (12),
    foreign key (IDUsuario) references users (IDUsuario)
);

create table semestre(
    IDSemestre int primary key,
    IDEscuela int,
    NombreSemestre varchar (12),
    foreign key (IDEscuela) references escuela (IDEscuela)
);

create table materias(
    IDMateria int primary key,
    IDSemestre int,
    NombreMateria varchar (12),
    foreign key (IDSemestre) references semestre (IDSemestre)
);

create table profesores(
    IDProfesor int primary key,
    IDSemestre int,
    NombreP varchar (12),
    ApellidoMaternoP varchar (12),
    ApellidoPaternoP varchar (12),
    Telefono varchar (10),
    Email varchar(76),
    foreign key (IDSemestre) references semestre (IDSemestre)
);

create table horarios(
    IDHorario int primary key,
    IDMateria int,
    IDProfesor int,
    Dia int,
    HoraEntrada time,
    HoraSalida time,
    foreign key (IDMateria) references materias (IDMateria),
    foreign key (IDProfesor) references profesores (IDProfesor)
);

create table notas(
    IDNotas int primary key,
    IDUsuario int,
    Titulo varchar (20),
    Descripcion varchar (500),
    foreign key (IDUsuario) references users (IDUsuario)
);