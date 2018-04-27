CREATE TABLE `GOODS_DETAIL` (
    `PID`                     INT        NOT NULL  AUTO_INCREMENT
    COMMENT '商品ID',
    
    
    `LTIME`                   INT(9)     NULL      DEFAULT 0
    COMMENT '剩余时间',
    `LTONGBAO`                INT(9)     NULL      DEFAULT 0
    COMMENT '剩余通宝（个）',
    `POINTS`                  INT(9)     NULL      DEFAULT 0
    COMMENT '商城积分（点）',
    `CONSUMPTION`             INT(9)     NULL      DEFAULT 0
    COMMENT '冲销（元）',
    
    
    # TODO 截图
    
    `PVEA`                    INT(9)     NULL      DEFAULT 0
    COMMENT 'PVE第一心法',
    `PVEB`                    INT(9)     NULL      DEFAULT 0
    COMMENT 'PVE第二心法',
    
    `PVPA`                    INT(9)     NULL      DEFAULT 0
    COMMENT 'PVP第一心法',
    `PVPB`                    INT(9)     NULL      DEFAULT 0
    COMMENT 'PVP第二心法',
    `LEGENDARMS`              INT(1)     NULL
    COMMENT '橙武ID',
    `QUALIFICATIONS`          INT(9)     NULL      DEFAULT 0
    COMMENT '资历（点）',
    `FACTION`                 INT(1)     NULL      DEFAULT 0
    COMMENT '阵营ID',
    
    
    `APPEARANCE`              TEXT       NULL
    COMMENT '外观IDS，包含限时限量红发金发奇遇坐骑等等等等',
    `FACE_NUM`                INT(9)     NULL      DEFAULT 0
    COMMENT '捏脸（数量）',
    `CLOTHES_NUM`             INT(9)     NULL      DEFAULT 0
    COMMENT '商城成衣（数量）',
    `WHITE_NUM`               INT(9)     NULL      DEFAULT 0
    COMMENT '黑发（数量）',
    `BLACK_NUM`               INT(9)     NULL      DEFAULT 0
    COMMENT '白发（数量）',
    `FACE_PENDANT_NUM`        INT(9)     NULL      DEFAULT 0
    COMMENT '面挂（数量）',
    `REAR_PENDANT_NUM`        INT(9)     NULL      DEFAULT 0
    COMMENT '背部挂件（数量）',
    `WAIST_PENDANT_NUM`       INT(9)     NULL      DEFAULT 0
    COMMENT '腰部挂件（数量）',
    
    `PET_NUM`                 INT(9)     NULL      DEFAULT 0
    COMMENT '宠物（数量）',
    
    `MEMO`                    VARCHAR(0) NULL
    COMMENT '备注（以上未能列举的信息，请写在这里）',
    
    
    `ACCOUNT_SEPARATION_TYPE` INT(1)     NULL      DEFAULT 0
    COMMENT '是否需要分离（选择：需要（或可以），不需要（或不能））',
    `RESET_TYPE`              INT(1)     NULL      DEFAULT 0
    COMMENT '身份证和重置情况（选择，无，有且可重置，有且不可重置）',
    PRIMARY KEY (`PID`)
);
