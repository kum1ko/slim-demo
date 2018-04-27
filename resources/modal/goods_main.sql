CREATE TABLE `GOODS_MAIN` (
    `GID`        INT          NOT NULL  AUTO_INCREMENT
    COMMENT '主ID',
    
    
    `SERVER`     INT(2)       NULL      DEFAULT 1
    COMMENT '区服GID',
    `SERVER_T`   VARCHAR(20)  NULL
    COMMENT '区服类型（点卡，月卡等）',
    `SERVER_L`   VARCHAR(20)  NULL
    COMMENT '区服线路（电信，双线，搞事区等）',
    
    
    `SCHOOL`     INT(2)       NULL      DEFAULT 1
    COMMENT '门派ID',
    `BODY`       INT(2)       NULL      DEFAULT 1
    COMMENT '体型ID',
    
    `PRICE_TYPE` INT(2)       NULL      DEFAULT 1
    COMMENT '售价类型ID',
    `PRICE_FROM` INT(29)      NULL      DEFAULT 0
    COMMENT '售价下限(分)',
    `PRICE_TO`   INT(9)       NULL      DEFAULT 0
    COMMENT '售价上限(分)',
    
    `TITLE`      VARCHAR(255) NULL
    COMMENT '标题（卖点）',
    `STATUS`     INT(1)       NULL      DEFAULT 0
    COMMENT '状态（上架，下架）',
    
    `CONTACTID`  INT(6)       NULL      DEFAULT 0
    COMMENT '销售信息ID',
    
    PRIMARY KEY (`GID`)
);
