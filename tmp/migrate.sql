-- Table: public.migrations

-- DROP TABLE public.migrations;

CREATE TABLE public.migrations
(
  id integer NOT NULL DEFAULT nextval('migrations_id_seq'::regclass),
  migration character varying(255) NOT NULL,
  batch integer NOT NULL,
  CONSTRAINT migrations_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.migrations
  OWNER TO dev;

-- Table: public.tests

-- DROP TABLE public.tests;

CREATE TABLE public.tests
(
  id integer NOT NULL DEFAULT nextval('tests_id_seq'::regclass),
  created_at timestamp(0) without time zone,
  updated_at timestamp(0) without time zone,
  CONSTRAINT tests_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.tests
  OWNER TO dev;

SELECT 
  migrations.id, 
  migrations.migration, 
  migrations.batch
FROM 
  public.migrations;


-- Table: public.posts

-- DROP TABLE public.posts;

CREATE TABLE public.posts
(
  id integer NOT NULL DEFAULT nextval('posts_id_seq'::regclass),
  title character varying(255) NOT NULL,
  content text NOT NULL,
  is_active boolean NOT NULL,
  category_id integer NOT NULL,
  created_at timestamp(0) without time zone,
  updated_at timestamp(0) without time zone,
  CONSTRAINT posts_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.posts
  OWNER TO dev;


-- Table: public.categories

-- DROP TABLE public.categories;

CREATE TABLE public.categories
(
  id integer NOT NULL DEFAULT nextval('categories_id_seq'::regclass),
  name character varying(100) NOT NULL,
  created_at timestamp(0) without time zone,
  updated_at timestamp(0) without time zone,
  CONSTRAINT categories_pkey PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE public.categories
  OWNER TO dev;

