
BEGIN;

-----------------------------------------------------------------------
-- comment
-----------------------------------------------------------------------

DROP TABLE IF EXISTS "comment" CASCADE;

CREATE TABLE "comment"
(
    "id" serial NOT NULL,
    "author_name" VARCHAR(64),
    "author_email" VARCHAR(64),
    "comment_title" VARCHAR(128) NOT NULL,
    "comment_text" VARCHAR(1024) NOT NULL,
    "avatar_link" VARCHAR(1024),
    "comment_date" TIMESTAMP,
    "page_id" INTEGER NOT NULL,
    PRIMARY KEY ("id")
);

COMMIT;
