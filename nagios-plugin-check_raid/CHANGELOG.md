# check_raid changelog

## [4.0.9] - UNRELEASED

- mpt-status: Enable checking of multiple mpt controllers, [#177]
- add [sensu] support, [#178]
- enable usage of new HP ssacli (replacing hpssacli), [#182]

[#177]: https://github.com/glensc/nagios-plugin-check_raid/pull/177
[#178]: https://github.com/glensc/nagios-plugin-check_raid/issues/178
[#182]: https://github.com/glensc/nagios-plugin-check_raid/pull/182
[sensu]: https://sensuapp.org/docs/1.0/overview/what-is-sensu.html
[4.0.9]: https://github.com/glensc/nagios-plugin-check_raid/compare/4.0.8...master

## [4.0.8] - 2017-09-01

NOTES:
- The annoying `dm` plugin bug present since `4.0.2` is fixed, however it will
  print messages to `stderr`, which shouldn't affect nagios itself, only maybe
  confusing when running script from terminal.

CHANGES:
- update sudoers to allow icinga user, [#171]
- dm: detect if raid devices present, [#172] and [#138], [#158], [#142], [#170]

[4.0.8]: https://github.com/glensc/nagios-plugin-check_raid/compare/4.0.7...4.0.8
[#171]: https://github.com/glensc/nagios-plugin-check_raid/issues/171
[#172]: https://github.com/glensc/nagios-plugin-check_raid/pull/172
[#138]: https://github.com/glensc/nagios-plugin-check_raid/issues/138
[#158]: https://github.com/glensc/nagios-plugin-check_raid/issues/158
[#142]: https://github.com/glensc/nagios-plugin-check_raid/issues/142
[#170]: https://github.com/glensc/nagios-plugin-check_raid/issues/170

## [4.0.7] - 2017-06-18

- remove duplicate `-W` parameter [#168], @CoolDuke
- build .deb and .rpm with a release

[4.0.7]: https://github.com/glensc/nagios-plugin-check_raid/compare/4.0.6...4.0.7
[#168]: https://github.com/glensc/nagios-plugin-check_raid/pull/168

## [4.0.6] - 2017-04-20

- failed md hotspares not detected [#164], [#165], @bzed

[4.0.6]: https://github.com/glensc/nagios-plugin-check_raid/compare/4.0.5...4.0.6
[#164]: https://github.com/glensc/nagios-plugin-check_raid/issues/164
[#165]: https://github.com/glensc/nagios-plugin-check_raid/pull/165

## [4.0.5] - 2016-12-26

- hpacucli: skip firmware upgrade noise, [#157]
- cciss: import smartctl, [#149]

[4.0.5]: https://github.com/glensc/nagios-plugin-check_raid/compare/4.0.4...4.0.5
[#149]: https://github.com/glensc/nagios-plugin-check_raid/issues/149
[#157]: https://github.com/glensc/nagios-plugin-check_raid/issues/157

## [4.0.4] - 2016-12-11

- arcconf: fix subsection parsing [#156]

[4.0.4]: https://github.com/glensc/nagios-plugin-check_raid/compare/4.0.3...4.0.4
[#156]: https://github.com/glensc/nagios-plugin-check_raid/pull/156

## [4.0.3] - 2016-11-20

- arcconf: parse Unparsed Physical Device data [#86]
- hpssacli: handle Unknown status in HP Raid Controller [#145]
- arcconf: fix 2.x parse problems [#152]
- arcconf: fix Arcconf 2.00 (NOT PARSED) [#128]
- arcconf: fix wrong parsing of logical degrated/critical, 44af5b1
- hpacucli: add commandline option to specify targets to monitor, [#151]
- dmraid: add type=GROUP support, [#129]
- hpacucli: verify only that slot name starts with digit. [#139]
- hpacucli: rewritten how data is parsed, 5762977
- hpacucli: split controller modes to array, f95c611
- hpacucli: parse controller status, 03ae764
- hpacucli: check/report controller/cache/battery status, f16f0c2
- fix plugin commandline options support, a2c5b8a
- hpacucli: handle not configured controller with noraid status code. [#145], [#151], [#154], 85423dd
- arcconf: fix duplicate degrated report [#155]
- arcconf: add `/usr/StorMan` to search path [#155]

[4.0.3]: https://github.com/glensc/nagios-plugin-check_raid/compare/4.0.2...4.0.3
[#86]: https://github.com/glensc/nagios-plugin-check_raid/issues/86
[#128]: https://github.com/glensc/nagios-plugin-check_raid/issues/128
[#129]: https://github.com/glensc/nagios-plugin-check_raid/issues/129
[#139]: https://github.com/glensc/nagios-plugin-check_raid/issues/139
[#145]: https://github.com/glensc/nagios-plugin-check_raid/issues/145
[#151]: https://github.com/glensc/nagios-plugin-check_raid/issues/151
[#152]: https://github.com/glensc/nagios-plugin-check_raid/issues/152
[#154]: https://github.com/glensc/nagios-plugin-check_raid/issues/154
[#155]: https://github.com/glensc/nagios-plugin-check_raid/issues/155

## [4.0.2] - 2016-03-14

- dm: Support for Linux Device-Mapper targets. [#134], [#130]

[4.0.2]: https://github.com/glensc/nagios-plugin-check_raid/compare/4.0.1...4.0.2
[#130]: https://github.com/glensc/nagios-plugin-check_raid/issues/130
[#134]: https://github.com/glensc/nagios-plugin-check_raid/pull/134

## [4.0.1] - 2016-02-29

NOTES:
- `tw_cli` users need to update their `sudo` rules

CHANGES:
- megacli: Support Predictive Failures as Warning rather than critical [#123]
- tw_cli: Implement detailed BBU & Enclosure checks [#131]

[4.0.1]: https://github.com/glensc/nagios-plugin-check_raid/compare/4.0.0...4.0.1
[#123]: https://github.com/glensc/nagios-plugin-check_raid/issues/123
[#131]: https://github.com/glensc/nagios-plugin-check_raid/pull/131

## [4.0.0] - 2015-10-31

Source code layout changed so that all plugins are in separate file ([#115]). The
distribution will still include single `check_raid.pl` file for official
releases. See [Development](README.md#development) how to roll `check_raid.pl`
or run from source tree yourself.

Despite the major version change, the underlying plugins code is same as in 3.2.5.

[4.0.0]: https://github.com/glensc/nagios-plugin-check_raid/compare/3.2.5...4.0.0
[#115]: https://github.com/glensc/nagios-plugin-check_raid/issues/115

## [3.2.5] - 2015-10-03

NOTES:
- `arcconf` users need to update their `sudo` rules
- `arcconf` & `tw_cli` respect bbu monitoring flag, which defaults to off

CHANGES:
- tw_cli: respect bbu monitoring flag in tw_cli (defaults to off). [#117]
- hpssacli: make plugin to work if hpacucli is dected as well. [#116], [#114]
- arcconf: parse multiple controllers. [#110], [#118]
- mvcli: new plugin, partial implementation [#92]
- improvements to `make rpm`. [#108]
- arcconf: bbu monitoring is optional (defaults to off). [#118]

[3.2.5]: https://github.com/glensc/nagios-plugin-check_raid/compare/3.2.4...3.2.5
[#92]: https://github.com/glensc/nagios-plugin-check_raid/issues/92
[#108]: https://github.com/glensc/nagios-plugin-check_raid/pull/108
[#110]: https://github.com/glensc/nagios-plugin-check_raid/issues/110
[#114]: https://github.com/glensc/nagios-plugin-check_raid/issues/114
[#116]: https://github.com/glensc/nagios-plugin-check_raid/issues/116
[#117]: https://github.com/glensc/nagios-plugin-check_raid/issues/117
[#118]: https://github.com/glensc/nagios-plugin-check_raid/pull/118

## [3.2.4] - 2015-07-03

- arcconf: handle unparsed data from Arcconf 1.7. [#99]
- cciss: parse spare drive status. [#100]
- hide errors from sudo -h when using old sudo. [#88]
- don't detect sudo if running as root. fixes [#101]
- hpacucli: check for array status. fixes [#98]
- hp_msa: allow configuring via plugin-options. [#97]
- allow plugin specific options [#58]
- make plugins work even if plugin programs not executable for non-root [#104]
- arcconf: handle when battery has failed and no status available at all. [#105]
- hpacucli: fix for HP H240ar controller. [#106]
- add make rpm target [#108]
- add missing lsscsi command for cciss. [#109]

[3.2.4]: https://github.com/glensc/nagios-plugin-check_raid/compare/3.2.3...3.2.4
[#58]: https://github.com/glensc/nagios-plugin-check_raid/issues/58
[#88]: https://github.com/glensc/nagios-plugin-check_raid/issues/88
[#97]: https://github.com/glensc/nagios-plugin-check_raid/issues/97
[#98]: https://github.com/glensc/nagios-plugin-check_raid/issues/98
[#99]: https://github.com/glensc/nagios-plugin-check_raid/issues/99
[#100]: https://github.com/glensc/nagios-plugin-check_raid/issues/100
[#101]: https://github.com/glensc/nagios-plugin-check_raid/issues/101
[#104]: https://github.com/glensc/nagios-plugin-check_raid/issues/104
[#105]: https://github.com/glensc/nagios-plugin-check_raid/issues/105
[#106]: https://github.com/glensc/nagios-plugin-check_raid/issues/106
[#108]: https://github.com/glensc/nagios-plugin-check_raid/pull/108
[#109]: https://github.com/glensc/nagios-plugin-check_raid/issues/109

## [3.2.3] - 2015-03-25

- arcconf: dead disks have no id, use physical location instead [#90]
- sudo: detect if sudo has `-A` option [#88]
- mpt: fix uninitialized value in mpt plugin when tool is installed but no controllers are present [#95]
- megacli: handle CacheCade devices (ignore for now). [#91]
- sas2ircu: handle when no RAID function is available (LSI 9202 16E) [#93]
- metastat: plugin is now usable [#38], [#96]
- hpssacli: adding hpssacli support [#94]

[3.2.3]: https://github.com/glensc/nagios-plugin-check_raid/compare/3.2.2...3.2.3
[#38]: https://github.com/glensc/nagios-plugin-check_raid/issues/38
[#88]: https://github.com/glensc/nagios-plugin-check_raid/issues/88
[#90]: https://github.com/glensc/nagios-plugin-check_raid/issues/90
[#91]: https://github.com/glensc/nagios-plugin-check_raid/issues/91
[#93]: https://github.com/glensc/nagios-plugin-check_raid/pull/93
[#94]: https://github.com/glensc/nagios-plugin-check_raid/pull/94
[#95]: https://github.com/glensc/nagios-plugin-check_raid/issues/95
[#96]: https://github.com/glensc/nagios-plugin-check_raid/pull/96

## [3.2.2] - 2014-11-15

- cciss: fix parsing enclosure with no enclosure name [#84]
- megacli: actually report that cache is disabled [#85]
- arcconf: accept 'Ready' as OK drive state [#87]
- tw_cli: tweak VERIFYING state [#89]
- megacli: JBOD state of physical device is OK as well [#82]

[3.2.2]: https://github.com/glensc/nagios-plugin-check_raid/compare/3.2.1...3.2.2
[#82]: https://github.com/glensc/nagios-plugin-check_raid/pull/82
[#84]: https://github.com/glensc/nagios-plugin-check_raid/issues/84
[#85]: https://github.com/glensc/nagios-plugin-check_raid/issues/85
[#87]: https://github.com/glensc/nagios-plugin-check_raid/issues/87
[#89]: https://github.com/glensc/nagios-plugin-check_raid/pull/89

## [3.2.1] - 2014-10-07

NOTES:
- megacli now checks cache state, use `--cache-fail=STATE` if default `WARNING` is not for you.

CHANGES:
- cciss: fix parsing enclosure with space and no serial [#83]
- megacli: alert if default is WriteBack, but current is WriteThrough [#65]

[3.2.1]: https://github.com/glensc/nagios-plugin-check_raid/compare/3.2.0...3.2.1
[#65]: https://github.com/glensc/nagios-plugin-check_raid/issues/65
[#83]: https://github.com/glensc/nagios-plugin-check_raid/issues/83

## [3.2.0] - 2014-09-21

NOTE: when using `cciss` plugin with `hpsa` kernel driver, install `lsscsi`
program and `cciss_vol_status` 1.10+ to get best results. `cciss_vol_status`
v1.10 enables check of individual disks and their S.M.A.R.T status.

- sudoers: support `#includedir` if enabled in sudoers config
- tw_cli: rewritten with full data parsing
- cciss: rewritten with full data parsing, optionally use lsscsi to find controller devices

[3.2.0]: https://github.com/glensc/nagios-plugin-check_raid/compare/3.1.0...3.2.0

## [3.1.0] - 2014-09-08

NOTES:
- `mpt-status` and `sas2ircu` users need to update their `sudo` rules

CHANGES:
- sudoers: disable requiretty (enabled in CentOS 6.5) [#52]
- megacli fixes [#50], [#53], [#56], [#63], [#74], [#32]
- arcconf fixes [#47], [#51], [#55], [#67], [#68], [#66]
- mpt-status fixes [#36], [#57]
- add `/opt/bin` to `$PATH` [#54]
- add travis integration
- hpacucli fixes [#62]
- mdstat auto-readonly raid fix [#64]
- areca fixes [#72]
- dmraid detect fixes [#60]
- mdstat: do not trigger WARN when checking (even multiple) arrays by default [#77]
- fixed behaviour of `--noraid` option [#70]
- sas2ircu: add disks check, handle no RAID volumes [#71]

[3.1.0]: https://github.com/glensc/nagios-plugin-check_raid/compare/3.0.5...3.1.0
[#32]: https://github.com/glensc/nagios-plugin-check_raid/issues/32
[#36]: https://github.com/glensc/nagios-plugin-check_raid/issues/36
[#47]: https://github.com/glensc/nagios-plugin-check_raid/issues/47
[#50]: https://github.com/glensc/nagios-plugin-check_raid/issues/50
[#51]: https://github.com/glensc/nagios-plugin-check_raid/issues/51
[#52]: https://github.com/glensc/nagios-plugin-check_raid/issues/52
[#53]: https://github.com/glensc/nagios-plugin-check_raid/issues/53
[#54]: https://github.com/glensc/nagios-plugin-check_raid/issues/54
[#55]: https://github.com/glensc/nagios-plugin-check_raid/issues/55
[#56]: https://github.com/glensc/nagios-plugin-check_raid/issues/56
[#57]: https://github.com/glensc/nagios-plugin-check_raid/pull/57
[#60]: https://github.com/glensc/nagios-plugin-check_raid/pull/60
[#62]: https://github.com/glensc/nagios-plugin-check_raid/pull/62
[#63]: https://github.com/glensc/nagios-plugin-check_raid/issues/63
[#64]: https://github.com/glensc/nagios-plugin-check_raid/issues/64
[#66]: https://github.com/glensc/nagios-plugin-check_raid/pull/66
[#67]: https://github.com/glensc/nagios-plugin-check_raid/issues/67
[#68]: https://github.com/glensc/nagios-plugin-check_raid/pull/68
[#70]: https://github.com/glensc/nagios-plugin-check_raid/pull/70
[#71]: https://github.com/glensc/nagios-plugin-check_raid/pull/71
[#72]: https://github.com/glensc/nagios-plugin-check_raid/pull/72
[#74]: https://github.com/glensc/nagios-plugin-check_raid/pull/74
[#77]: https://github.com/glensc/nagios-plugin-check_raid/pull/77

## [3.0.5] - 2013-11-27

- fixed program version

[3.0.5]: https://github.com/glensc/nagios-plugin-check_raid/compare/3.0.4...3.0.5

## [3.0.4] - 2013-11-25

- added `--noraid=OK|WARNING|CRITICAL|UNKNOWN` option. defaults to `UNKNOWN`
- setup sudo rules option (`-S`) supports debug (`-d`) and will only print the
  rules. Output is sent to stdout, so you can save that output to file of
  your liking.
- sudo: add `-A` option to use askpass and fail sooner if no sudo rules present
- arcconf: check physical devices
- megacli: Fixed handling of multiple Virtual Drive without name
- megacli: Batteries check (megacli), perfdata, longoutput, and `--noraidok` option ([#39], [#33])
- megacli: reports CRITICAL on Battery state Optimal ([#45], [#46])
- set state WARNING when raid is resyncing by default, override with `--resync=STATE`
- arcconf: check physical devices

[3.0.4]: https://github.com/glensc/nagios-plugin-check_raid/compare/3.0.3...3.0.4
[#33]: https://github.com/glensc/nagios-plugin-check_raid/issues/33
[#39]: https://github.com/glensc/nagios-plugin-check_raid/pull/39
[#45]: https://github.com/glensc/nagios-plugin-check_raid/issues/45
[#46]: https://github.com/glensc/nagios-plugin-check_raid/pull/46

## [3.0.3] - 2013-11-12

- resync fixes

[3.0.3]: https://github.com/glensc/nagios-plugin-check_raid/compare/3.0.2...3.0.3

## [3.0.2] - 2013-11-11

- Detecting SCSI devices or hosts with `lsscsi`
- Updated to handle ARCCONF 9.30 output
- Fixed `-W` option handling ([#29])
- `dmraid` support ([#35])
- `mdstat` plugin rewritten to handle external devices ([#34])
- added `--resync=OK|WARNING|CRITICAL|UNKNOWN` option. defaults to `OK` ([#23], [#24], [#28], [#37])

[3.0.2]: https://github.com/glensc/nagios-plugin-check_raid/compare/3.0.1...3.0.2
[#23]: https://github.com/glensc/nagios-plugin-check_raid/pull/23
[#24]: https://github.com/glensc/nagios-plugin-check_raid/issues/24
[#28]: https://github.com/glensc/nagios-plugin-check_raid/pull/28
[#29]: https://github.com/glensc/nagios-plugin-check_raid/pull/29
[#34]: https://github.com/glensc/nagios-plugin-check_raid/issues/34
[#35]: https://github.com/glensc/nagios-plugin-check_raid/pull/35
[#37]: https://github.com/glensc/nagios-plugin-check_raid/pull/37

## [3.0.1] - 2013-05-23

- Fixes to `cciss` plugin, improvements in `mpt`, `areca`, `mdstat` plugins

[3.0.1]: https://github.com/glensc/nagios-plugin-check_raid/compare/2.2.50...3.0.5

## 2.2

NOTES:
- Project moved to [github](https://github.com/glensc/nagios-plugin-check_raid)

CHANGES:
- SAS2IRCU support
- Areca SATA RAID Support

## 2.1

NOTES:
- New maintainer Elan Ruusamäe

CHANGES:
- Made script more generic and secure
- Added `gdth`
- Added `dpt_i2o`
- Added 3ware SATA RAID
- Added Adaptec AAC-RAID via `arcconf`
- Added LSI MegaRaid via `megarc`
- Added LSI MegaRaid via `CmdTool2`
- Added HP/Compaq Smart Array via `cciss_vol_status`
- Added HP MSA1500 check via serial line
- Added checks via HP `hpacucli` utility.
- Added `hpsa` module support for `cciss_vol_status`
- Added `smartctl` checks for cciss disks

## 2.0
- Added `megaraid`, `mpt` (`serveraid`), `aaccli` (`serveraid`)

## 1.1
- IPS; Solaris, AIX, Linux software RAID; `megaide`
