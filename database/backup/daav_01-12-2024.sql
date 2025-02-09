PGDMP  &    :                |            daav    14.12    16.3 b    {           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            |           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            }           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            ~           1262    68395    daav    DATABASE        CREATE DATABASE daav WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_United States.1252';
    DROP DATABASE daav;
                postgres    false                        2615    68622    invoice    SCHEMA        CREATE SCHEMA invoice;
    DROP SCHEMA invoice;
                postgres    false                        2615    2200    public    SCHEMA     2   -- *not* creating schema, since initdb creates it
 2   -- *not* dropping schema, since initdb creates it
                postgres    false                       0    0    SCHEMA public    ACL     Q   REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;
                   postgres    false    4            �            1259    68624 
   order_info    TABLE     �  CREATE TABLE invoice.order_info (
    id bigint NOT NULL,
    ord_date date NOT NULL,
    customer_id integer NOT NULL,
    add_note character varying(255),
    email_msg character varying(255),
    is_active boolean,
    created_at timestamp without time zone,
    updated_at timestamp without time zone,
    created_by integer,
    username character varying,
    designation character varying
);
    DROP TABLE invoice.order_info;
       invoice         heap    postgres    false    6            �            1259    68623    order_info_id_seq    SEQUENCE     {   CREATE SEQUENCE invoice.order_info_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE invoice.order_info_id_seq;
       invoice          postgres    false    6    232            �           0    0    order_info_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE invoice.order_info_id_seq OWNED BY invoice.order_info.id;
          invoice          postgres    false    231            �            1259    68633 
   order_item    TABLE     7  CREATE TABLE invoice.order_item (
    id bigint NOT NULL,
    order_id integer NOT NULL,
    product_id integer NOT NULL,
    product_name character varying(255),
    color_front character varying(100),
    color_back character varying(100),
    design_id integer NOT NULL,
    design_name character varying(255),
    order_height numeric,
    order_width numeric,
    cutting_height numeric,
    cutting_width numeric,
    qty integer,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp without time zone,
    updated_at time without time zone
);
    DROP TABLE invoice.order_item;
       invoice         heap    postgres    false    6            �            1259    68632    order_item_id_seq    SEQUENCE     {   CREATE SEQUENCE invoice.order_item_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE invoice.order_item_id_seq;
       invoice          postgres    false    6    234            �           0    0    order_item_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE invoice.order_item_id_seq OWNED BY invoice.order_item.id;
          invoice          postgres    false    233            �            1259    68525    cache    TABLE     �   CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);
    DROP TABLE public.cache;
       public         heap    postgres    false    4            �            1259    68532    cache_locks    TABLE     �   CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);
    DROP TABLE public.cache_locks;
       public         heap    postgres    false    4            �            1259    68590 	   customers    TABLE     A  CREATE TABLE public.customers (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    address_1 character varying(255) NOT NULL,
    address_2 character varying(255) NOT NULL,
    town character varying(255) NOT NULL,
    postcode character varying(6) NOT NULL,
    email character varying(255),
    state character varying(255) NOT NULL,
    phone character varying(20) NOT NULL,
    name_ship character varying(255) NOT NULL,
    address_1_ship character varying(255) NOT NULL,
    address_2_ship character varying(255) NOT NULL,
    town_ship character varying(255) NOT NULL,
    postcode_ship character varying(6) NOT NULL,
    state_ship character varying(255) NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.customers;
       public         heap    postgres    false    4            �            1259    68589    customers_id_seq    SEQUENCE     y   CREATE SEQUENCE public.customers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.customers_id_seq;
       public          postgres    false    228    4            �           0    0    customers_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.customers_id_seq OWNED BY public.customers.id;
          public          postgres    false    227            �            1259    68579    designs    TABLE       CREATE TABLE public.designs (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    description character varying(255) NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.designs;
       public         heap    postgres    false    4            �            1259    68578    designs_id_seq    SEQUENCE     w   CREATE SEQUENCE public.designs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.designs_id_seq;
       public          postgres    false    226    4            �           0    0    designs_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.designs_id_seq OWNED BY public.designs.id;
          public          postgres    false    225            �            1259    68557    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false    4            �            1259    68556    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    222    4            �           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    221            �            1259    68549    job_batches    TABLE     d  CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);
    DROP TABLE public.job_batches;
       public         heap    postgres    false    4            �            1259    68540    jobs    TABLE     �   CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);
    DROP TABLE public.jobs;
       public         heap    postgres    false    4            �            1259    68539    jobs_id_seq    SEQUENCE     t   CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE public.jobs_id_seq;
       public          postgres    false    219    4            �           0    0    jobs_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;
          public          postgres    false    218            �            1259    68492 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false    4            �            1259    68491    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    211    4            �           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    210            �            1259    68509    password_reset_tokens    TABLE     �   CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 )   DROP TABLE public.password_reset_tokens;
       public         heap    postgres    false    4            �            1259    68569    products    TABLE     /  CREATE TABLE public.products (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    description text NOT NULL,
    price numeric(10,2) NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.products;
       public         heap    postgres    false    4            �            1259    68568    products_id_seq    SEQUENCE     x   CREATE SEQUENCE public.products_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.products_id_seq;
       public          postgres    false    4    224            �           0    0    products_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;
          public          postgres    false    223            �            1259    68600    regions    TABLE     u  CREATE TABLE public.regions (
    id bigint NOT NULL,
    code character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    short_code character varying(255) NOT NULL,
    district character varying(255) NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.regions;
       public         heap    postgres    false    4            �            1259    68599    regions_id_seq    SEQUENCE     w   CREATE SEQUENCE public.regions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.regions_id_seq;
       public          postgres    false    4    230            �           0    0    regions_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.regions_id_seq OWNED BY public.regions.id;
          public          postgres    false    229            �            1259    68516    sessions    TABLE     �   CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);
    DROP TABLE public.sessions;
       public         heap    postgres    false    4            �            1259    68499    users    TABLE     �  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    designation_id character varying(255),
    mobile_no bigint,
    username character varying(100)
);
    DROP TABLE public.users;
       public         heap    postgres    false    4            �            1259    68498    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    213    4            �           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    212            �           2604    68627    order_info id    DEFAULT     p   ALTER TABLE ONLY invoice.order_info ALTER COLUMN id SET DEFAULT nextval('invoice.order_info_id_seq'::regclass);
 =   ALTER TABLE invoice.order_info ALTER COLUMN id DROP DEFAULT;
       invoice          postgres    false    232    231    232            �           2604    68636    order_item id    DEFAULT     p   ALTER TABLE ONLY invoice.order_item ALTER COLUMN id SET DEFAULT nextval('invoice.order_item_id_seq'::regclass);
 =   ALTER TABLE invoice.order_item ALTER COLUMN id DROP DEFAULT;
       invoice          postgres    false    233    234    234            �           2604    68593    customers id    DEFAULT     l   ALTER TABLE ONLY public.customers ALTER COLUMN id SET DEFAULT nextval('public.customers_id_seq'::regclass);
 ;   ALTER TABLE public.customers ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    228    227    228            �           2604    68582 
   designs id    DEFAULT     h   ALTER TABLE ONLY public.designs ALTER COLUMN id SET DEFAULT nextval('public.designs_id_seq'::regclass);
 9   ALTER TABLE public.designs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    226    225    226            �           2604    68560    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    222    221    222            �           2604    68543    jobs id    DEFAULT     b   ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);
 6   ALTER TABLE public.jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    219    218    219            �           2604    68495    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    211    210    211            �           2604    68572    products id    DEFAULT     j   ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);
 :   ALTER TABLE public.products ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    224    223    224            �           2604    68603 
   regions id    DEFAULT     h   ALTER TABLE ONLY public.regions ALTER COLUMN id SET DEFAULT nextval('public.regions_id_seq'::regclass);
 9   ALTER TABLE public.regions ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    229    230    230            �           2604    68502    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    213    212    213            v          0    68624 
   order_info 
   TABLE DATA           �   COPY invoice.order_info (id, ord_date, customer_id, add_note, email_msg, is_active, created_at, updated_at, created_by, username, designation) FROM stdin;
    invoice          postgres    false    232   �t       x          0    68633 
   order_item 
   TABLE DATA           �   COPY invoice.order_item (id, order_id, product_id, product_name, color_front, color_back, design_id, design_name, order_height, order_width, cutting_height, cutting_width, qty, is_active, created_at, updated_at) FROM stdin;
    invoice          postgres    false    234   u       f          0    68525    cache 
   TABLE DATA           7   COPY public.cache (key, value, expiration) FROM stdin;
    public          postgres    false    216   �u       g          0    68532    cache_locks 
   TABLE DATA           =   COPY public.cache_locks (key, owner, expiration) FROM stdin;
    public          postgres    false    217   �u       r          0    68590 	   customers 
   TABLE DATA           �   COPY public.customers (id, name, address_1, address_2, town, postcode, email, state, phone, name_ship, address_1_ship, address_2_ship, town_ship, postcode_ship, state_ship, is_active, created_at, updated_at) FROM stdin;
    public          postgres    false    228   �u       p          0    68579    designs 
   TABLE DATA           [   COPY public.designs (id, name, description, is_active, created_at, updated_at) FROM stdin;
    public          postgres    false    226   �v       l          0    68557    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          postgres    false    222   �v       j          0    68549    job_batches 
   TABLE DATA           �   COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
    public          postgres    false    220   �v       i          0    68540    jobs 
   TABLE DATA           c   COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
    public          postgres    false    219   w       a          0    68492 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    211   (w       d          0    68509    password_reset_tokens 
   TABLE DATA           I   COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
    public          postgres    false    214   �w       n          0    68569    products 
   TABLE DATA           c   COPY public.products (id, name, description, price, is_active, created_at, updated_at) FROM stdin;
    public          postgres    false    224   �w       t          0    68600    regions 
   TABLE DATA           j   COPY public.regions (id, code, name, short_code, district, is_active, created_at, updated_at) FROM stdin;
    public          postgres    false    230   Wx       e          0    68516    sessions 
   TABLE DATA           _   COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
    public          postgres    false    215   �x       c          0    68499    users 
   TABLE DATA           �   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at, designation_id, mobile_no, username) FROM stdin;
    public          postgres    false    213   �z       �           0    0    order_info_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('invoice.order_info_id_seq', 6, true);
          invoice          postgres    false    231            �           0    0    order_item_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('invoice.order_item_id_seq', 5, true);
          invoice          postgres    false    233            �           0    0    customers_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.customers_id_seq', 1, true);
          public          postgres    false    227            �           0    0    designs_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.designs_id_seq', 5, true);
          public          postgres    false    225            �           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    221            �           0    0    jobs_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);
          public          postgres    false    218            �           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 7, true);
          public          postgres    false    210            �           0    0    products_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.products_id_seq', 3, true);
          public          postgres    false    223            �           0    0    regions_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.regions_id_seq', 2, true);
          public          postgres    false    229            �           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 2, true);
          public          postgres    false    212            �           2606    68631    order_info order_info_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY invoice.order_info
    ADD CONSTRAINT order_info_pkey PRIMARY KEY (id);
 E   ALTER TABLE ONLY invoice.order_info DROP CONSTRAINT order_info_pkey;
       invoice            postgres    false    232            �           2606    68641    order_item order_item_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY invoice.order_item
    ADD CONSTRAINT order_item_pkey PRIMARY KEY (id);
 E   ALTER TABLE ONLY invoice.order_item DROP CONSTRAINT order_item_pkey;
       invoice            postgres    false    234            �           2606    68538    cache_locks cache_locks_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);
 F   ALTER TABLE ONLY public.cache_locks DROP CONSTRAINT cache_locks_pkey;
       public            postgres    false    217            �           2606    68531    cache cache_pkey 
   CONSTRAINT     O   ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);
 :   ALTER TABLE ONLY public.cache DROP CONSTRAINT cache_pkey;
       public            postgres    false    216            �           2606    68598    customers customers_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.customers
    ADD CONSTRAINT customers_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.customers DROP CONSTRAINT customers_pkey;
       public            postgres    false    228            �           2606    68587    designs designs_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.designs
    ADD CONSTRAINT designs_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.designs DROP CONSTRAINT designs_pkey;
       public            postgres    false    226            �           2606    68565    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    222            �           2606    68567 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            postgres    false    222            �           2606    68555    job_batches job_batches_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.job_batches DROP CONSTRAINT job_batches_pkey;
       public            postgres    false    220            �           2606    68547    jobs jobs_pkey 
   CONSTRAINT     L   ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);
 8   ALTER TABLE ONLY public.jobs DROP CONSTRAINT jobs_pkey;
       public            postgres    false    219            �           2606    68497    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    211            �           2606    68515 0   password_reset_tokens password_reset_tokens_pkey 
   CONSTRAINT     q   ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);
 Z   ALTER TABLE ONLY public.password_reset_tokens DROP CONSTRAINT password_reset_tokens_pkey;
       public            postgres    false    214            �           2606    68577    products products_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.products DROP CONSTRAINT products_pkey;
       public            postgres    false    224            �           2606    68610    regions regions_code_key 
   CONSTRAINT     S   ALTER TABLE ONLY public.regions
    ADD CONSTRAINT regions_code_key UNIQUE (code);
 B   ALTER TABLE ONLY public.regions DROP CONSTRAINT regions_code_key;
       public            postgres    false    230            �           2606    68608    regions regions_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.regions
    ADD CONSTRAINT regions_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.regions DROP CONSTRAINT regions_pkey;
       public            postgres    false    230            �           2606    68522    sessions sessions_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.sessions DROP CONSTRAINT sessions_pkey;
       public            postgres    false    215            �           2606    68508    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    213            �           2606    68506    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    213            �           1259    68548    jobs_queue_index    INDEX     B   CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);
 $   DROP INDEX public.jobs_queue_index;
       public            postgres    false    219            �           1259    68524    sessions_last_activity_index    INDEX     Z   CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);
 0   DROP INDEX public.sessions_last_activity_index;
       public            postgres    false    215            �           1259    68523    sessions_user_id_index    INDEX     N   CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);
 *   DROP INDEX public.sessions_user_id_index;
       public            postgres    false    215            v   J   x�3�4202�54�5��4���$ACS+SC+#s�b�1~\&D�cdeb�Un�Q�[c������ c�*v      x   �   x���=
�0����@J$K�֐3t�b��Ku�O��P�$�[���~�>�^����iޕy�a|!�h�\˩b��^Z�@����B�6%^%��Ԏ^kLq��xއm��Ρ��8��R��>�z �QpO�      f      x������ � �      g      x������ � �      r   �   x����� F��S� �p�H�d���F���i�韯o����������sE�P.T���N�E)�S�S|3�F������n��%�D�����R�cC��[��܅��JYc�ɵ�c�g� J*�!f2�h
m�����N�1���]�      p   >   x�3�LKI�LOI�,�4202�54�50Q00�24�25�&�e�YT_�M����61�=... �      l      x������ � �      j      x������ � �      i      x������ � �      a   �   x�e��
� �g��ab���2ֆ�c�C��������x�܀2� ��=�Q\ޒ��ٍ/Q���@��C*�'�>��
I�Ab8�!$���0m>7�5KG,vu�$i��*�M�z���[���~B�7<�鐠�F���j�������X�      d      x������ � �      n   d   x�3�t��/��z�%�FF&����&
�V�V��ĸ�8�9�S0uU�X�� b�2�LL,.����)�)Ŝ��F�15�&����� ��(K      t   /   x�3�400�t)M*J�*(-�t	u�t�,J�(��,��"�=... �
�      e   �  x��QK��@<��8�l��%�=�Ұh��셗��>A~����u��M��u������p~T�ܾIN3�uy�e���ĩ��$���p�d�xa:����(c�X�ţǤj.��9��߸�&o\+M^�y]��K���E8A�{٨?8F��[�qQ�r�ٹ*�1����}x�_�A�+`�����d	WQmw@JE-�НS߶�&xE��r�0�+F�LL@��J����vi��⸵�>��E�}��,)�=�����p�亞�㲡D�I+3��s�x�E��:�e1����k�.�7g�W]��M�������!_�'�����s#~���ӽ���4=~��������M�h��x�"�t��@4�yk�CC�~�$�3!��ħW��ւ�瀟Ba&��L�&�LE m
X(�n4��R#[�������ξ��C7�[�1��D��]3�\�8�5QV;�]�-���������]���'��ⲭ���/(Bi6�=� cOD>      c   �   x�m��N�@���,�B��2�J�D�PlZ+6M����Nh���F��������̎z�)��?IPzS�Y���-�̈��hH��5ع3�V�6I��WQŊ������~�.��O���鵌��h� &�u�<����6o�8(��ܵ�w�iH�)�$m��B�E%�뇍��n|W��ui��b\�3T��F|}~(d�ߵ�@4)���yF���6s�+���!	���i���[�     