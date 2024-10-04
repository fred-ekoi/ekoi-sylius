"use strict";

function afterDeploy(context) {
    return [`php ${context.release.path}/bin/console d:m:m -n`, `php ${context.release.path}/bin/console c:c`];
}

module.exports = function (options) {
    return {
        common: {
            mode: "synchronize",
            localPath: "./", //Warning : Do not leave blank !
            share: {
                uploads: "public/uploads",
                "media-cache": "public/media/cache",
                "translations-dir": "translations",
                log: "var/log",
            },
            exclude: [".github/**", ".github", ".docker", ".docker/**", ".platform", ".platform/**", "tests/**", "tests", ".git/**", ".git"],
            create: ["var", "var/log", "var/cache", "var/cache/prod", "var/cache/preprod", "public/uploads", "public/media/cache", "public/media/image"],
            onAfterDeploy: afterDeploy,
        },

        environments: {
            preprod: {
                host: process.env.SSH_HOST,
                username: process.env.SSH_LOGIN,
                password: process.env.SSH_PWD,
                port: 22,
                deployPath: process.env.SSH_PATH,
            },
            prod: {
                host: process.env.SSH_HOST,
                username: process.env.SSH_LOGIN,
                password: process.env.SSH_PWD,
                port: 22,
                deployPath: process.env.SSH_PATH,
            },
        },
    };
};
