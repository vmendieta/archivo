--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.4
-- Dumped by pg_dump version 9.4.4
-- Started on 2016-02-24 22:27:42

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 182 (class 3079 OID 11855)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2097 (class 0 OID 0)
-- Dependencies: 182
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- TOC entry 183 (class 3079 OID 16992)
-- Name: pgcrypto; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS pgcrypto WITH SCHEMA public;


--
-- TOC entry 2098 (class 0 OID 0)
-- Dependencies: 183
-- Name: EXTENSION pgcrypto; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pgcrypto IS 'cryptographic functions';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 177 (class 1259 OID 16588)
-- Name: doc_ingreso; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE doc_ingreso (
    id_documento integer NOT NULL,
    registro integer,
    anio character varying(50),
    pagina character varying(50),
    id_ingreso integer NOT NULL
);


ALTER TABLE doc_ingreso OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 16586)
-- Name: doc_ingreso_id_ingreso_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE doc_ingreso_id_ingreso_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE doc_ingreso_id_ingreso_seq OWNER TO postgres;

--
-- TOC entry 2099 (class 0 OID 0)
-- Dependencies: 176
-- Name: doc_ingreso_id_ingreso_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE doc_ingreso_id_ingreso_seq OWNED BY doc_ingreso.id_ingreso;


--
-- TOC entry 179 (class 1259 OID 16596)
-- Name: documentos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE documentos (
    id_documento integer NOT NULL,
    seccion character varying(100),
    numero integer,
    volumen integer NOT NULL,
    fec_crea timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE documentos OWNER TO postgres;

--
-- TOC entry 2100 (class 0 OID 0)
-- Dependencies: 179
-- Name: TABLE documentos; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE documentos IS 'par [volume, numero] unico x seccion
pero puede repetirse en otra seccion
aunque seccion puede ser null
';


--
-- TOC entry 178 (class 1259 OID 16594)
-- Name: documentos_id_documento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE documentos_id_documento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE documentos_id_documento_seq OWNER TO postgres;

--
-- TOC entry 2101 (class 0 OID 0)
-- Dependencies: 178
-- Name: documentos_id_documento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE documentos_id_documento_seq OWNED BY documentos.id_documento;


--
-- TOC entry 175 (class 1259 OID 16576)
-- Name: investigador; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE investigador (
    id_investigador integer NOT NULL,
    nombres character varying(100) NOT NULL,
    apellidos character varying(100) NOT NULL,
    ci character varying(10) NOT NULL,
    nacionalidad character varying(15),
    direccion character varying(200),
    email character varying(150),
    telefono character varying(50),
    tema character varying(250) NOT NULL,
    fec_crea timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE investigador OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 16574)
-- Name: investigador_id_investigador_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE investigador_id_investigador_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE investigador_id_investigador_seq OWNER TO postgres;

--
-- TOC entry 2102 (class 0 OID 0)
-- Dependencies: 174
-- Name: investigador_id_investigador_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE investigador_id_investigador_seq OWNED BY investigador.id_investigador;


--
-- TOC entry 181 (class 1259 OID 16616)
-- Name: solicitud_salida; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE solicitud_salida (
    id_solicitud integer NOT NULL,
    responsable integer NOT NULL,
    solicitante integer NOT NULL,
    tipo_solicitud character varying(3) NOT NULL,
    id_investigador integer,
    id_documento integer,
    l_formato character varying(15),
    l_fec_entrega date,
    l_hora_entrega time without time zone,
    l_fec_devol date,
    l_hora_devol time without time zone,
    d_fec_hora_entrega timestamp without time zone,
    d_fec_hora_devol timestamp without time zone,
    c_fec_hora_entrega timestamp without time zone,
    c_fec_hora_devol timestamp without time zone,
    e_fec_inicio date,
    e_fec_fin date,
    e_lugar character varying(100),
    e_motivo character varying(250),
    v_fec_entrega date,
    v_fec_devol date,
    v_institucion character varying(100),
    v_cant_alumnos integer,
    fec_hora_solicitud timestamp without time zone DEFAULT now() NOT NULL,
    hora_salida character varying(8),
    v_hora_entrega time without time zone,
    v_hora_devol time without time zone
);


ALTER TABLE solicitud_salida OWNER TO postgres;

--
-- TOC entry 2103 (class 0 OID 0)
-- Dependencies: 181
-- Name: TABLE solicitud_salida; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE solicitud_salida IS 'lectura=l
descripcion=d
conservacion=c
exposicion=e
visita_guiada=v';


--
-- TOC entry 2104 (class 0 OID 0)
-- Dependencies: 181
-- Name: COLUMN solicitud_salida.tipo_solicitud; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN solicitud_salida.tipo_solicitud IS '0--Lectura
1--Descripcion
2--Conservacion
3--Exposicion
4--Visita Guiada';


--
-- TOC entry 2105 (class 0 OID 0)
-- Dependencies: 181
-- Name: COLUMN solicitud_salida.l_formato; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN solicitud_salida.l_formato IS '--Impreso
--Digital';


--
-- TOC entry 180 (class 1259 OID 16614)
-- Name: solicitud_salida_id_solicitud_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE solicitud_salida_id_solicitud_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE solicitud_salida_id_solicitud_seq OWNER TO postgres;

--
-- TOC entry 2106 (class 0 OID 0)
-- Dependencies: 180
-- Name: solicitud_salida_id_solicitud_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE solicitud_salida_id_solicitud_seq OWNED BY solicitud_salida.id_solicitud;


--
-- TOC entry 173 (class 1259 OID 16548)
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuarios (
    id_usuario integer NOT NULL,
    username character varying(10) NOT NULL,
    nombres character varying(100) NOT NULL,
    apellidos character varying(100) NOT NULL,
    ci character varying(15) NOT NULL,
    email character varying(150),
    dependencia character varying(150),
    fec_crea timestamp without time zone DEFAULT now() NOT NULL,
    password character varying(100)
);


ALTER TABLE usuarios OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 16546)
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuarios_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE usuarios_id_usuario_seq OWNER TO postgres;

--
-- TOC entry 2107 (class 0 OID 0)
-- Dependencies: 172
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE usuarios_id_usuario_seq OWNED BY usuarios.id_usuario;


--
-- TOC entry 1947 (class 2604 OID 16591)
-- Name: id_ingreso; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY doc_ingreso ALTER COLUMN id_ingreso SET DEFAULT nextval('doc_ingreso_id_ingreso_seq'::regclass);


--
-- TOC entry 1948 (class 2604 OID 16599)
-- Name: id_documento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY documentos ALTER COLUMN id_documento SET DEFAULT nextval('documentos_id_documento_seq'::regclass);


--
-- TOC entry 1945 (class 2604 OID 16579)
-- Name: id_investigador; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY investigador ALTER COLUMN id_investigador SET DEFAULT nextval('investigador_id_investigador_seq'::regclass);


--
-- TOC entry 1950 (class 2604 OID 16619)
-- Name: id_solicitud; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY solicitud_salida ALTER COLUMN id_solicitud SET DEFAULT nextval('solicitud_salida_id_solicitud_seq'::regclass);


--
-- TOC entry 1943 (class 2604 OID 16551)
-- Name: id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('usuarios_id_usuario_seq'::regclass);


--
-- TOC entry 2085 (class 0 OID 16588)
-- Dependencies: 177
-- Data for Name: doc_ingreso; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY doc_ingreso (id_documento, registro, anio, pagina, id_ingreso) FROM stdin;
1	1234	2002	2	13
\.


--
-- TOC entry 2108 (class 0 OID 0)
-- Dependencies: 176
-- Name: doc_ingreso_id_ingreso_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('doc_ingreso_id_ingreso_seq', 16, true);


--
-- TOC entry 2087 (class 0 OID 16596)
-- Dependencies: 179
-- Data for Name: documentos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY documentos (id_documento, seccion, numero, volumen, fec_crea) FROM stdin;
1	1213164	1111544	121215	2015-12-09 04:25:29.737
2	12545	10	12	2015-12-09 15:11:50.425
3	254	1	1	2015-12-09 15:12:20.923
5	123	1	1	2016-02-23 14:10:00.86
6	123	1	2	2016-02-23 14:10:23.244
\.


--
-- TOC entry 2109 (class 0 OID 0)
-- Dependencies: 178
-- Name: documentos_id_documento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('documentos_id_documento_seq', 38, true);


--
-- TOC entry 2083 (class 0 OID 16576)
-- Dependencies: 175
-- Data for Name: investigador; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY investigador (id_investigador, nombres, apellidos, ci, nacionalidad, direccion, email, telefono, tema, fec_crea) FROM stdin;
1	Ana	Rios	2354876	paraguaya		mail@gmail.com		Historia del rio de la Plata	2015-12-09 03:35:22.277
3	Alejandra	Cazal	215555	paraguaya		mail@gmail.com		Historia del rio de la Plata	2015-12-09 03:35:58.438
4	Maria	Mendieta	4512354	paraguaya	\N	prueba11@ejemplo.com	\N	Solano Lopez	2015-12-09 03:59:52.937
5	Juan	Mendieta	45123544	paraguayo	\N	prueba11@ejemplo.com	\N	Mcal Solano Lopez	2015-12-09 04:14:40.215
6	Maria	Jara	2357311	Paraguaya	Dr Fleming 207	viviana@gmail.com	021290290	Tema1	2016-02-23 21:37:04.756
\.


--
-- TOC entry 2110 (class 0 OID 0)
-- Dependencies: 174
-- Name: investigador_id_investigador_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('investigador_id_investigador_seq', 10, true);


--
-- TOC entry 2089 (class 0 OID 16616)
-- Dependencies: 181
-- Data for Name: solicitud_salida; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY solicitud_salida (id_solicitud, responsable, solicitante, tipo_solicitud, id_investigador, id_documento, l_formato, l_fec_entrega, l_hora_entrega, l_fec_devol, l_hora_devol, d_fec_hora_entrega, d_fec_hora_devol, c_fec_hora_entrega, c_fec_hora_devol, e_fec_inicio, e_fec_fin, e_lugar, e_motivo, v_fec_entrega, v_fec_devol, v_institucion, v_cant_alumnos, fec_hora_solicitud, hora_salida, v_hora_entrega, v_hora_devol) FROM stdin;
2	1	1	0	1	1	Impreso	2015-12-09	19:36:05.907	2015-12-09	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2015-12-09 19:36:05.907	\N	\N	\N
3	1	3	0	1	1	Impreso	2015-12-09	19:40:06.195	2015-12-09	19:40:06.195	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2015-12-09 19:40:06.195	\N	\N	\N
4	1	3	0	1	1	Impreso	2016-02-10	23:05:39.229	2016-02-10	23:05:39.229	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-10 23:05:39.229	\N	\N	\N
5	1	3	0	1	1	Impreso	2016-02-10	23:21:23.273	2016-02-10	23:21:23.273	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-10 23:21:23.273	\N	\N	\N
6	1	3	0	1	1	Impreso	2016-02-10	23:24:18.616	2016-02-10	23:24:18.616	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-10 23:24:18.616	\N	\N	\N
7	1	3	0	1	1	Impreso	2016-02-11	00:53:36.116	2016-02-11	00:53:36.116	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-11 00:53:36.116	\N	\N	\N
8	1	3	0	1	1	Impreso	2016-02-11	00:57:06.197	2016-02-11	00:57:06.197	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-11 00:57:06.197	08:23	\N	\N
9	1	4	1	\N	2	\N	\N	\N	\N	\N	2016-02-09 09:45:21	2016-02-03 05:25:21	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-12 01:59:45.159	05:25	\N	\N
10	1	4	1	\N	2	\N	\N	\N	\N	\N	2016-02-09 09:45:21	2016-02-03 05:25:21	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-12 02:00:45.389	05:25	\N	\N
11	1	4	1	\N	2	\N	\N	\N	\N	\N	2016-02-19 14:30:52	2016-02-04 06:25:52	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-12 02:01:17.703	09:45	\N	\N
12	1	4	1	\N	2	\N	\N	\N	\N	\N	2016-02-19 14:30:52	2016-02-04 06:25:52	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-12 02:03:31.495	09:45	\N	\N
13	1	4	1	\N	3	\N	\N	\N	\N	\N	2016-02-10 13:45:06	2016-02-09 08:40:06	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-12 11:48:54.377	09:45	\N	\N
14	1	3	1	\N	2	\N	\N	\N	\N	\N	2016-02-09 11:45:05	2016-02-03 09:45:05	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-12 11:50:24.077	13:45	\N	\N
15	1	2	1	\N	1	\N	\N	\N	\N	\N	2016-02-17 22:45:55	2016-02-26 22:50:55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-17 22:47:27.229	22:50	\N	\N
16	1	4	1	\N	2	\N	\N	\N	\N	\N	2016-02-17 13:45:05	2016-02-17 13:05:05	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-17 22:48:24.666	10:50	\N	\N
17	1	4	1	\N	1	\N	\N	\N	\N	\N	2016-02-10 09:45:55	2016-02-18 22:50:55	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-17 22:50:20.853	04:20	\N	\N
18	1	4	1	\N	2	\N	\N	\N	\N	\N	2016-02-16 13:55:16	2016-02-03 09:45:16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-18 14:59:41.325	09:45	\N	\N
19	1	2	1	\N	3	\N	\N	\N	\N	\N	2016-02-18 17:45:18	2016-02-02 09:45:18	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-18 17:49:38.787	17:40	\N	\N
20	1	4	1	\N	1	\N	\N	\N	\N	\N	2016-01-27 01:05:29	2016-02-18 14:10:29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-18 19:51:51.276	08:40	\N	\N
21	1	3	1	\N	1	\N	\N	\N	\N	\N	2016-02-21 19:30:25	2016-02-21 18:50:26	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-21 21:14:02.306	09:25	\N	\N
22	1	3	1	\N	1	\N	\N	\N	\N	\N	2016-02-21 22:05:16	2016-02-21 22:50:16	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-21 22:06:44.931	13:25	\N	\N
23	1	3	1	\N	2	\N	\N	\N	\N	\N	2016-02-21 22:05:29	2016-02-23 16:20:29	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-21 22:08:02.792	09:45	\N	\N
24	1	4	1	\N	3	\N	\N	\N	\N	\N	2016-02-21 22:05:03	2016-02-22 16:20:03	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-21 22:09:13.918	05:25	\N	\N
25	1	4	0	5	2	Digital	2016-02-20	23:20:00	2016-02-20	23:55:00	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-21 23:20:56.175	23:15	\N	\N
26	1	3	2	\N	3	\N	\N	\N	\N	\N	\N	\N	2016-02-21 23:25:56	2016-02-18 14:10:56	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-21 23:22:02.944	23:45	\N	\N
27	1	4	3	\N	3	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-21	2016-02-27	Villa Elisa Municipalidad	Aniversario de la ciudad de Villa Elisa	\N	\N	\N	\N	2016-02-21 23:24:25.187	23:45	\N	\N
28	1	4	4	\N	2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-19	2016-02-27	CNN	25	2016-02-21 23:27:32.328	23:50	\N	\N
29	1	4	4	\N	2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-19	2016-02-27	CNN	25	2016-02-22 19:32:10.12	23:50	\N	\N
30	1	2	4	\N	2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-25	2016-02-23	CNN	20	2016-02-22 20:24:31.368	09:45	13:20:00	01:05:00
31	1	1	0	3	1	Impreso	2016-02-24	13:20:00	2016-02-16	00:20:00	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-22 20:27:20.757	12:20	\N	\N
32	1	3	4	\N	3	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-23	2016-02-23	LLP	12	2016-02-22 20:47:02.397	20:45	21:45:00	18:50:00
33	1	2	0	4	2	Impreso	2016-02-10	09:45:00	2016-02-10	18:30:00	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-22 20:50:39.706	01:05	\N	\N
34	1	2	0	3	2	Impreso	2016-02-23	12:40:00	2016-02-23	05:25:00	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-22 20:54:52.687	04:20	\N	\N
35	1	4	1	\N	1	\N	\N	\N	\N	\N	2016-02-18 14:50:53	2016-02-17 13:05:53	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-22 20:55:30.88	05:25	\N	\N
36	1	4	2	\N	3	\N	\N	\N	\N	\N	\N	\N	2016-02-09 08:55:31	2016-02-24 17:25:31	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-22 20:56:13.296	05:25	\N	\N
37	1	4	3	\N	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-18	2016-02-18	El Sitio	Movida	\N	\N	\N	\N	2016-02-22 20:56:59.41	05:45	\N	\N
38	1	4	2	\N	1	\N	\N	\N	\N	\N	\N	\N	2016-02-17 13:55:59	2016-02-03 09:55:59	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-22 20:57:34.247	20:25	\N	\N
39	1	3	4	\N	1	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-22	2016-02-22	LLP8	11	2016-02-22 21:00:44.699	20:45	16:45:00	20:55:00
40	1	4	4	\N	2	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-22	2016-02-22	LLP9	9	2016-02-22 21:01:34.49	09:45	16:00:00	21:00:00
41	1	4	1	\N	1	\N	\N	\N	\N	\N	2016-02-22 23:05:01	2016-02-25 21:05:01	\N	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-22 21:09:00.416	17:05	\N	\N
42	1	4	2	\N	2	\N	\N	\N	\N	\N	\N	\N	2016-02-22 21:05:00	2016-02-24 17:05:00	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-22 21:11:40.851	09:45	\N	\N
43	1	4	3	\N	2	\N	\N	\N	\N	\N	\N	\N	\N	\N	2016-02-22	2016-02-25	NOSE	Tampoco	\N	\N	\N	\N	2016-02-22 21:12:57.541	17:45	\N	\N
\.


--
-- TOC entry 2111 (class 0 OID 0)
-- Dependencies: 180
-- Name: solicitud_salida_id_solicitud_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('solicitud_salida_id_solicitud_seq', 45, true);


--
-- TOC entry 2081 (class 0 OID 16548)
-- Dependencies: 173
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY usuarios (id_usuario, username, nombres, apellidos, ci, email, dependencia, fec_crea, password) FROM stdin;
4	pcabrera	Pedro	Cabrera	235485	pcabrera@archivo.gov.py	Deposito	2015-12-09 03:04:26.334	$2a$06$EjhyEteE4NVxA0UaFVY6leUF1HyWR85/DHXQ.AZ1FWBXY1gSY7a1G
3	rmeza	Ramon	Meza	2357345	rmeza@archivo.gov.py	Deposito	2015-12-08 11:31:42.842	$2a$06$3/Jyj.P2a2RrfhWbuOHRlOWQFSULv7fxdTwcI8LcGCbKmzEuBogs6
2	mjara	Maria	Jara	2864878	mjara@archivo.gov.py	Biblioteca	2015-12-08 11:30:39.063	$2a$06$F7R3MElSihUwAqAiHN39aOohIpCwiUR5cb/X7PDlnficKFJN3JGgq
1	jperez	Juan	Perez	1564878	jperez@archivo.gov.py	Deposito	2015-12-08 11:29:59.344	$2a$06$SRdl3fvvcYWwv/4FnklpVu/kzApxP5OR4sOONMnRGdPtvO56akMvC
\.


--
-- TOC entry 2112 (class 0 OID 0)
-- Dependencies: 172
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usuarios_id_usuario_seq', 4, true);


--
-- TOC entry 1953 (class 2606 OID 16561)
-- Name: ci; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT ci UNIQUE (ci);


--
-- TOC entry 1963 (class 2606 OID 16602)
-- Name: id_documento; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT id_documento PRIMARY KEY (id_documento);


--
-- TOC entry 1961 (class 2606 OID 16593)
-- Name: id_ingreso; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY doc_ingreso
    ADD CONSTRAINT id_ingreso PRIMARY KEY (id_ingreso);


--
-- TOC entry 1959 (class 2606 OID 16585)
-- Name: id_investigador; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY investigador
    ADD CONSTRAINT id_investigador PRIMARY KEY (id_investigador);


--
-- TOC entry 1965 (class 2606 OID 16625)
-- Name: id_solicitud; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY solicitud_salida
    ADD CONSTRAINT id_solicitud PRIMARY KEY (id_solicitud);


--
-- TOC entry 1955 (class 2606 OID 16557)
-- Name: id_usuario; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT id_usuario PRIMARY KEY (id_usuario);


--
-- TOC entry 1957 (class 2606 OID 16559)
-- Name: username; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT username UNIQUE (username);


--
-- TOC entry 1966 (class 2606 OID 16603)
-- Name: id_documento; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY doc_ingreso
    ADD CONSTRAINT id_documento FOREIGN KEY (id_documento) REFERENCES documentos(id_documento);


--
-- TOC entry 1970 (class 2606 OID 16641)
-- Name: id_documento; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY solicitud_salida
    ADD CONSTRAINT id_documento FOREIGN KEY (id_documento) REFERENCES documentos(id_documento);


--
-- TOC entry 1969 (class 2606 OID 16636)
-- Name: id_investigador; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY solicitud_salida
    ADD CONSTRAINT id_investigador FOREIGN KEY (id_investigador) REFERENCES investigador(id_investigador);


--
-- TOC entry 1967 (class 2606 OID 16626)
-- Name: responsable; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY solicitud_salida
    ADD CONSTRAINT responsable FOREIGN KEY (responsable) REFERENCES usuarios(id_usuario);


--
-- TOC entry 1968 (class 2606 OID 16631)
-- Name: solicitante; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY solicitud_salida
    ADD CONSTRAINT solicitante FOREIGN KEY (solicitante) REFERENCES usuarios(id_usuario);


--
-- TOC entry 2096 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-02-24 22:27:42

--
-- PostgreSQL database dump complete
--

