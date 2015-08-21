# Merged PRs Script for PHP

Version: 2.0

Self executable script to determine merged PRs for your project.

Outputs to console and notify's slack if configured. Links to JIRA issues for your project as well.

Written in PHP since it's installed on all OSX machines by default. Also written procedurally to keep it extremely simple.

## Installation
In order to use the `merged-prs` tool it will need to exist in your `$PATH`.

* Clone the repo to a local path:

```
git clone git@github.com:promiseofcake/merged-prs-php.git
```

* Add the cloned path to your `$PATH` on a new shell or in your `.bashrc` or similar:

```
export PATH=$PATH:/path/to/merged-prs-php
```

## Configuration
To configure the script, copy the config skeleton file: `cp config/config-user.php.skel config/config-user.php` and begin editing.
The following fields should be configured in order to work properly

* `['github']['orginization']`: Name of the account which contains the projects you wish to diff (eg: `promiseofcake`)
* `['github']['user_agent']`: User's GitHub username (eg: `promiseofcake`)
* `['github']['user_api_key']`: Personal access token with the `repo` permission (See: https://github.com/settings/tokens)

At this point you should have a working tool, if you wish to configure Slack notifications
please set the following:

* `['slack']['active']`: To enable/disable Slack (eg: `true`)
* `['slack']['channels'][0]`: Channel to notify (eg: `#general`)
* `['slack']['user_map']`: Hash of Github name to Slack name (eg: `['promiseofcake' => 'lucas']`)
* `['slack']['webhook_url']`: Slack Incoming Webhook to post to channels (eg: `https://hooks.slack.com/services/TOKENID`)


## Usage
Script can be used within a Git repository between any two hashes, tags, or branches

`merged-prs <PREV> <NEW>`

User should specify the older revision first ie. merging dev into master would necessitate
that master is the older commit, and dev is the newer

`merged-prs master dev`

Trying to determine the changelog between the previous two production tags on master

`merged-prs prod-2015-08-20-1428 prod-2015-08-20-1528`

Output will print to console as well as notify Slack if configured in `config/config-user.php`.
By default, determines the diff between the previous two production tags `prod-` (as set in config).

If you wish to not notify slack, please pass `--test` as the first parameter and it will only output to console.

`merged-prs --test <PREV> <NEW>`

### Example

```
$ merged-prs master dev
Determining merged branches between the following hashes: master dev

Merged PRs between the following hashes: master master~2
  #1875 (@chris): Fix CreateEncryptedFile for Keys layout (https://github.com/promiseofcake/web/pull/1875)
  #1877 (@anthony): updating the prod password as told by chef prod.json (https://github.com/promiseofcake/web/pull/1877)
  #1888 (@brandon): Fix copy paste journal title change (https://github.com/promiseofcake/web/pull/1888)
  #1890 (@brandon): update title on home page to reflect (https://github.com/promiseofcake/web/pull/1890)
  #1891 (@brandon): Fix text to download focus (https://issues.promiseofcake.co/browse/WEB-6793)
```
